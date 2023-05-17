<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        Task::insert([
            'name' => $request->task_name,
            'assigned_to' => $request->assigned_to,
            'due_date' => $request->due_date,
            'description' => $request->description,
        ]);

        return redirect()->route('task.index');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('task.edit', compact('task'));
    }

    public function update($id, Request $request)
    {
        Task::where('id', $id)->update([
            'name' => $request->task_name,
            'assigned_to' => $request->assigned_to,
            'due_date' => $request->due_date,
            'description' => $request->description,
        ]);

        return redirect()->route('task.index');
    }

    public function show($id)
    {
        $task = Task::find($id);
        return view('task.show', compact('task'));
    }

    public function delete($id)
    {
        Task::destroy($id);

        return redirect()->route('task.index');
    }
}
