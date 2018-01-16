<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Index
     */
    public function index()
    {
        $categories = Category::all();


        return view('admin.categories.index')
            ->with('categories', $categories);
    }



    /**
     * Create
     */
    public function create()
    {

        $categories = DB::table('categories')->paginate(2);

        return view('admin.categories.category-create',['categories' => $categories]);
    }

    /**
     * Store
     */
    public function store(Request $request)
    {
        $cat = new Category();

        $cat->title = $request->title;

        $cat->save();

        return redirect('categories/create')->with('message','An Category has been added');
    }

    /**
     * Show
     */
    public function show($id)
    {
        //
    }

    /**
     * Edit
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     Destroy
     */
    public function destroy($id)
    {
        $cat = Category::find($id);

        $cat->delete();

        return redirect()->route('categories.create',$cat->id);
    }
}
