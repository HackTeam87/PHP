<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;


class DashPosts extends Controller
{

    //index

    public function index()
    {
        return view('admin.pages.start');
    }


    //create

    public function create()
    {
        $post = DB::table('posts')->paginate(2);
//       $post = Post::all();

        return view('admin.pages.create',['post'=>$post]);
    }



    //store

    public function store(Request $request)
    {
        $file = $request->file('file');
        $destinationPath = 'uploads/blogImage';
//        $filename = $file->getClientOriginalName();
        if (
        $this->validate($request, ['file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048' ,])
        ){
            $filename = $file->store('uploads/blogImage');
            $file->move($destinationPath,$filename);

        }


        $post = new Post();

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->text = $request->text;
        $post->video = $request->video;
        $post->file = $filename;

        $post->save();

        return redirect('admin-panel/create');
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

        return view('admin.pages.edit')->withPost($post);
    }


    //update

    public function update(Request $request, $id)
    {

        $file = $request->file('file');
        $destinationPath = 'uploads/blogImage';

        if (
        $this->validate($request, ['file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1048' ,])
        ){
            $filename = $file->store('uploads/blogImage');
            $file->move($destinationPath,$filename);

            echo '<h3>file uploaded ';
        }

        $post = Post::find($id);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->text = $request->text;
        $post->file = $filename;

        $post->save();


        return redirect()->route('admin-panel.create',$post->id);
    }


    //destroy

    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        return redirect()->route('admin-panel.create',$post->id);
    }


//    public function upload ( Request $request)
//    {
//        if ($request-hasFile('file')) {
//
//            $request->file->store('public/upload');
//            return 'yes';
//        }
//
//        return$request->all();
//    }
}
