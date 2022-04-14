<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksApiController extends Controller
{

    public function store(Request $request)
    {
        if (!$request->has('workspace')) {
            return 'error';
        }

        $id = $request->only('workspace');

        return DB::table('tasks')
            ->where('workspace_id', $id)
            ->get();
    }

    public function create(Request $request)
    {
        if (
            ! $request->has('header') &&
            ! $request->has('text') &&
            ! $request->has('status_id') &&
            ! $request->has('workspace_id')
        ) {
            return 'error';
        }

        $task = new Task();
        $task->header = $request->header;
        $task->text = $request->text;
        $task->status_id = $request->status_id;
        $task->workspace_id = $request->workspace_id;
        $task->save();

        return 'success';
    }

    public function changeStatus(Request $request)
    {
        if (
            ! $request->has('id') &&
            ! $request->has('status_id')
        ) {
            return 'error';
        }

        $tasks = new Task();
        $task = $tasks->find($request->id);
        $task->status_id = $request->status_id;
        $task->save();

        return 'success';
    }

    public function change(Request $request)
    {
        if (
            ! $request->has('id') &&
            ! $request->has('header') &&
            ! $request->has('text')
        ) {
            return 'error';
        }

        $tasks = new Task();
        $task = $tasks->find($request->id);
        $task->header = $request->header;
        $task->text = $request->text;
        $task->save();
    }

    public function delete(Request $request)
    {
        if (! $request->has('id')) {
            return 'error';
        }
        $tasks = new Task();
        $task = $tasks->find($request->id);
        $task->delete();
    }

}
