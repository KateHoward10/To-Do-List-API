<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;

class Tasks extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only(["task"]);
        $task = Task::create($data);
        return response($task, 201);
    }

    /**
     * Update task to completed.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function completed(Task $task)
    {
        $task->completed = !$task->completed;
        $task->save();
        return $task;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->only(["task"]);
        $task->fill($data)->save();
        return $task;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response(null, 204);
    }
}
