<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::get();
        return view('admin.task.index',compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data,
            [
                'title' => 'required',
                'description' => 'required',
            ]);

        if ($validator->fails()) {
            return redirect()->route('admin.task.create')
                ->withErrors($validator)
                ->withInput();
        }

        Task::create([
           'title' => $data['title'],
           'description' => $data['description']
        ]);

        return redirect()->route('admin.task.index')->with('message_success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('admin.task.edit',compact('task'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $task = Task::find($id);

        $validator = Validator::make($data,
            [
                'title' => 'required',
                'description' => 'required'
            ]);


        if ($validator->fails()) {
            return redirect()->route('admin.task.create')
                ->withErrors($validator)
                ->withInput();
        }

        Task::findOrFail($id);

        $params = [
            'title' => $data['title'],
            'description' => $data['description']
        ];

        $task->update($params);
        return redirect()->route('admin.task.index')->with('message_success', 'Task edit successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('admin.task.index')->with('message_success', 'Task deleted successfully!');
    }
}
