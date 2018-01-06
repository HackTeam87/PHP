<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

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
        $post = Posts::all();

        return view('admin.pages.create',['post'=>$post]);
    }



    //store

    public function store(Request $request)
    {
        $post = new Posts();

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->text = $request->text;

        $post->save();


        return redirect('admin-panel/create');
    }


    //show

    public function show($id)
    {
        $post = Posts::find($id);

        return view('admin.pages.show')->withPost($post);
    }

    //edit

    public function edit($id)
    {
        $post = Posts::find($id);

        return view('admin.pages.edit')->withPost($post);
    }


    //update

    public function update(Request $request, $id)
    {
        $post = Posts::find($id);

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->text = $request->text;

        $post->save();


        return redirect()->route('admin-panel.create',$post->id);
    }


    //destroy

    public function destroy($id)
    {
        $post = Posts::find($id);

        $post->delete();

        return redirect()->route('admin-panel.create',$post->id);
    }
}
