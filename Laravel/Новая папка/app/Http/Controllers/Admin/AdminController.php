<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Post;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = DB::select(' select * from posts ');
        $posts = Post::where('id','<','20')->paginate(3);
        return view('admin.posts', ['posts' => $posts]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Post::create($request->all());

        return redirect()->route('admin.posts', ['id = 1']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
//        public function edit($id)
    {
        return view('admin.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }




    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();


        return redirect(route('admin.posts'));

    }


//    public function destroy(Post $id)
//    {
//        $article = Post::find($id);
//        $article->delete();
//
//
//        return redirect(route('admin.posts'));
//
//    }

//    public function destroy()
//    {
////        $articles = Post::all();
//        $articles = Post::where('id', '>', 4)->orderBy('title')->take(3)->get();
//
//        $dumps = dump($articles);
//
//        $article = Post::find(14);
//
//        $article->delete();
//
//        return view('admin.delete',['articles' => $articles]);

//return redirect(route('admin.posts'))->with('message', 'An article has been deleted');
//


//    }
}
