<?php

namespace App\Http\Controllers\Adm;
use App\Http\Requests\ValidateFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use phpDocumentor\Reflection\Types\Nullable;


class DashController extends Controller
{
//    //IsAdmin
//
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }



    //index

    public function index()
    {
        return view('admin.posts.start');
    }


    //create

    public function create()
    {
        $post = Post::paginate(3);
//       $post = Post::all();

        $categories = Category::all();

        $users = User::all();

        return view('admin.posts.create', ['post' => $post], ['users' => $users])->with('categories', $categories);
    }


    //store

    public function store(ValidateFormRequest $request)
    {


        $file = $request->file('file');
        $destinationPath = 'uploads/blogImage';
//        $filename = $destinationPath.'/'.$file->getClientOriginalName();
        $filename = $file->store('uploads/blogImage');
        $file->move($destinationPath, $filename);


        $post = new Post();

        $post->title = $request->title;
        $post->text = $request->text;
        $post->video = $request->video;
        $post->category_id = $request->category_id;
        $post->file = $filename;


        $post->save();


//        Post::create($request->all());

        return redirect('admin-panel/create')->with('message', 'An Post has been added');
    }

    //show

    public function show($id)
    {
        $post = Post::find($id);

        return view('admin.posts.show')->withPost($post);
    }

    //edit

    public function edit($id)
    {
        $post = Post::find($id);

        $categories = Category::all();

        return view('admin.posts.edit', compact('categories'))->withPost($post);
    }

    //update

    public function update(Request $request, $id)
    {

        $post = Post::find($id);
        $post->title = $request->title;
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
