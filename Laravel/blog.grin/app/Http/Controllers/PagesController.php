<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class PagesController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('face.index', compact('categories'));
    }

    public function category($categorySlug)
    {
        $categories = Category::where ('slug',$categorySlug)->first();
        return view('face.category', compact('categories'));
    }

    public function post($categorySlug, $postSlug)
    {
        $category = Category::where ('slug',$categorySlug)->first();
        $post = Post::where ('id',$postSlug)->first();
        if ($category->exists() && $post->exists() &&
            $post->category_id == $category->id){

            return view('face.post', ['post' => $post]);
        }

        abort(404);
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}

