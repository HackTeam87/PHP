<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Task;

class TaskController extends Controller
{
    public function index ()
    {

        $posts = DB::select(' select * from tasks ');
        return view('tasks.index',['posts'=>$posts]);
    }

    public function create ()
    {
        return view('tasks.create');
    }



    public function store ( Request $request)
    {

        Task::create($request->all());

        return redirect()->route('task.index',['id = 1']);


    }
}
