<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index()
    {
        $todolists = Todolist::all();
        return view('home', compact('todolists'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'content' => 'required'
        ]);

        Todolist::create($data);
        return back();
    }

    public function destroy(Todolist $todolist)
    {
        $todolist->delete();
        return back();
    }
}
