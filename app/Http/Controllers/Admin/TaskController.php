<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $tasks = Task::get();
        return view('admin.task.index',compact('tasks'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.task.create');
    }

    /**
     * @param StoreTaskRequest $request
     * @return $this
     */
    public function store(StoreTaskRequest $request)
    {
        $data = $request->all();

        Task::create([
           'title' => $data['title'],
           'description' => $data['description'],
           'required_images' => $data['required_images']
        ]);

        return redirect()->route('admin.task.index')->with('message_success', 'Task created successfully.');
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('admin.task.edit',compact('task'));
    }

    /**
     * @param EditTaskRequest $request
     * @param $id
     * @return $this
     */
    public function update(EditTaskRequest $request, $id)
    {
        $data = $request->all();

        $task =  Task::findOrFail($id);

        $params = [
            'title' => $data['title'],
            'description' => $data['description'],
            'required_images' => $data['required_images']
        ];

        $task->update($params);
        return redirect()->route('admin.task.index')->with('message_success', 'Task edit successfully.');
    }

    /**
     * @param $id
     * @return $this
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('admin.task.index')->with('message_success', 'Task deleted successfully!');
    }
}
