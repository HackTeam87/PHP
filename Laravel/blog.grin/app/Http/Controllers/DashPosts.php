<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\Types\Nullable;


class DashPosts extends Controller
{
//    //Auth
//
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }


    //index

    public function index()
    {
        return view('admin.pages.start');
    }


    //create

    public function create()
    {
        $post = Post::paginate(2);
//       $post = Post::all();

        $categories = Category::all();



        return view('admin.pages.create', ['post' => $post], ['categories' => $categories]);
    }


    //store

    public function store(Request $request)
    {
        $file = $request->file('file');
        $destinationPath = 'uploads/blogImage';
//        $filename = $file->getClientOriginalName();
        if (
        $this->validate($request, ['file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1048',])
        ) {
            $filename = $file->store('uploads/blogImage');
            $file->move($destinationPath, $filename);

        }

        $post = new Post();

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->text = $request->text;
        $post->video = $request->video;
        $post->category_id = $request->category_id;
        $post->file = $filename;

        $post->save();

        return redirect('admin-panel/create')->with('message', 'An Post has been added');
    }

    //show

    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.pages.show')->withPost($post);
    }

    //edit

    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Category::all();

        return view('admin.pages.edit',compact('categories'))->withPost($post);
    }

    //update

    public function update(Request $request, $id)
    {

        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->text = $request->text;
        $post->category_id = $request->category_id;
        $post->save();
        return redirect()->route('admin-panel.create', $post->id);


    }

    //destroy

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('admin-panel.create', $post->id);
    }


    public function listByCategoryId($id)
    {
        $posts = Post::with('category')->where('id', $id)->get();
        return view('posts.single')
            ->with('posts', $posts);
    }

}
