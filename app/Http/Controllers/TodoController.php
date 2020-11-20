<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = Todo::all();
        $status = Todo::calculateStatus();
        return view('index',['todos'=>$todos,'status'=>$status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-todo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5'
        ]);

        Todo::create([
            'title' => $request->title
        ]);

        return redirect()->back()->with('success','New Todo added to database.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('edit-todo',['todo'=>$todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $request->validate([
            'title' => 'required|min:5'
        ]);

        $todo->title = $request->title;
        $todo->save();
        return redirect()->back()->with('success','Selected Todo edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('success','Selected Todo deleted.');
    }

    /**
     * Mark Todo complete
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function complete(Todo $todo)
    {
        $todo->status = 1;
        $todo->save();
        return redirect()->back()->with('success','Todo marked complete.');
    }

    /**
     * Mark todo pending
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function pending(Todo $todo)
    {
        $todo->status = 0;
        $todo->save();
        return redirect()->back()->with('success','Todo marked pending.');
    }
}
