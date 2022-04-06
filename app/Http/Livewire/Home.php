<?php

namespace App\Http\Livewire;

use App\Models\Task;
use Livewire\Component;

class Home extends Component
{
    public $tasks;

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->tasks  = Task::where('status', 0)->get();
        return view('livewire.home', ['tasks' => $this->tasks]);
    }
}
