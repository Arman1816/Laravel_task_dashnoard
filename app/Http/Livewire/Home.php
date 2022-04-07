<?php

namespace App\Http\Livewire;

use App\Models\Task;
use App\Models\UserTask;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Home extends Component
{
    public $tasks;

    public $task;


    public function render()
    {
        $userId = Auth::user()->id;
        $inProgressUserTask = UserTask::checkInProgressUserTask($userId);
        if($inProgressUserTask){
            $this->task = Task::where('id', $inProgressUserTask->task_id)->first();
            $this->tasks = [];
        }else{
            $this->tasks  = Task::where('status', 0)->get();
        }
        return view('livewire.home', ['tasks' => $this->tasks, 'task' => $this->task]);
    }
}
