<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function taskStart($taskId)
    {
        if(!$taskId){
            return redirect()->back();
        }

        $task = Task::where('id', $taskId)->first();
        return view('task.task-start', compact('task'));
    }
}
