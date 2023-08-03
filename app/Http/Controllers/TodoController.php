<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::where('author_id',auth()->user()->id)->get();
        return view('todos.index',compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $validated = $request->validated();

        $todoitem = Todo::create($validated);
        return back()->with('success',$todoitem['title']." Item successfully created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        if($todo->author_id==auth()->user()->id){
        //dd($request);
        $validated = $request->validated();
        //dd($validated);
        $updatedTODO = $todo->update([
            'title'=>$validated['title'],
            'is_complete'=>$validated['is_complete']
        ]);

        return back()->with('success',$todo['title']." Item successfully updated.");
        }else{
            return back()->with('error','Not Authorized');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return back()->with('success',"Todo Item successfully deleted");
    }
}
