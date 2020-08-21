<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/tasks');
    }

    public function update($id)
    {
        $task = Task::find($id);
        $task->completed = true;
        $task->save();

        return redirect('/tasks');
    }

    public function edit(Request $request, $id)
    {
        $task = Task::find($id);
        $task->name = $request->input('name');
        $task->save();

        return redirect('/tasks');
    }
}
