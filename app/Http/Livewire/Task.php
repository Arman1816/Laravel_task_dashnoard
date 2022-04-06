<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Task as TaskModel;
use Illuminate\Support\Facades\Http;


class Task extends Component
{
    public $task;


    /**
     * @param $taskId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function mount($taskId)
    {
        $this->task = TaskModel::find($taskId);
        return view('livewire.task', ['task' => $this->task]);
    }
}
