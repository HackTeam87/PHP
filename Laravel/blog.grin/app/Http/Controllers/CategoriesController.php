<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateForm2Request;
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

        $categories = Category::paginate(3);

        return view('admin.categories.category-create',['categories' => $categories]);
    }

    /**
     * Store
     */
    public function store(ValidateForm2Request $request)
    {

        $cat = new Category();

        $cat->title = $request->title;
        $cat->slug = $request->slug;

        $cat->save();

//        Category::create($request->all());

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
