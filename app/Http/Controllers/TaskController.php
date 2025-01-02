<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /* Show the form for creating a new resource.*/
    public function create()
    {
        //
    }

    /*Store a newly created resource in storage. */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Task::create([
            'title' => $request->title,
            'completed' => false,
        ]);

        return redirect('/'); // Redirige a la página principal después de agregar la tarea
    }

    /*Display the specified resource.*/
    public function show(Task $task)
    {
        //
    }

    /* Show the form for editing the specified resource. */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /* Update the specified resource in storage. */
    
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task->update([
            'title' => $request->title,
            'completed' => $request->has('completed'),
        ]);

        return redirect('/')->with('success', 'Tarea actualizada correctamente.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect('/')->with('success', 'Tarea eliminada correctamente.');
    }

    public function toggleCompleted(Task $task)
    {
        $task->update([
            'completed' => !$task->completed,
        ]);

        return redirect('/')->with('success', 'Estado de la tarea actualizado correctamente.');
    }


}
