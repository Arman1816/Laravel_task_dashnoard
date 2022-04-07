<?php

namespace App\Http\Livewire;

use App\Models\Image;
use App\Models\Status;
use App\Models\UserTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Task as TaskModel;
use App\Http\Services\Api;


class Task extends Component
{
    public $task;

    /**
     * @param $taskId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function mount($taskId)
    {
        if(!$taskId){
            return redirect()->back();
        }

        $this->addTaskInProgress($taskId);
        $this->task = TaskModel::find($taskId);

        return view('livewire.task', ['task' => $this->task]);
    }

    /**
     * @param $taskId
     */
    public function addTaskInProgress($taskId)
    {
        $userId = Auth::user()->id;
        $userTask = UserTask::checkTaskStatus($taskId, $userId);
        if(!$userTask){
            TaskModel::updateTaskStatus($taskId, Status::INPROGRESS);
            UserTask::createTask($userId, $taskId);
        }
    }

    /**
     * @param $search
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function search($search)
    {
        return Api::getApiResponse($search);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addImageToTask(Request $request)
    {
        $data = $request->all();

        try {
            Image::create([
                'task_id' => $data['taskId'],
                'image_path' => $data['url']
            ]);

            return response()->json([
                'message' => 'Image added to task successfully',
            ]);
        } catch (Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    /**
     * @param $taskId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function taskCompleted($taskId)
    {
        if(!$taskId){
            return redirect()->back();
        }

        $task = TaskModel::find($taskId);
        if($task->images->count() >= $task->required_images){
            $userId = Auth::user()->id;
            TaskModel::updateTaskStatus($taskId, Status::DONE);
            UserTask::updateUserTaskStatus($taskId, $userId, Status::DONE);
            return redirect(route('dashboard'));
        }else{
            return redirect()->back();
        }
    }

}
