<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index() //display data
    {
        return view('welcome',['todos'=>Todo::orderBy('id')->get()]);
    }

    public function edit(Todo $todo)  //edit data
    {
        return response()->json($todo);
    }

    public function store(Request $request) //insert data
    {
        $todo = Todo::updateOrCreate(
            ['id'=>$request->id],
            ['name'=>$request->name]
        );

        return response()->json($todo);

    }

    public function destroy(Todo $todo)   //delete data
    {
        $todo->delete();
        return response()->json('success');
    }
}