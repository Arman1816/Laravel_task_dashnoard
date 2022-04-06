<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Task;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('role', 'staff')->count();
        $task = Task::count();
        return view('admin.home',compact('user','task'));
    }
}
