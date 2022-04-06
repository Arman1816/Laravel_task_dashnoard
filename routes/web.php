<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('task-start/{taskId}', [App\Http\Controllers\TaskController::class, 'taskStart'])->name('task.start');
});



Route::middleware('admin.guest')->prefix('admin')->group(function () {
    Route::get('/', [App\Http\Controllers\Admin\Auth\LoginController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Admin\Auth\LoginController::class, 'authenticate'])->name('admin.login');
});



Route::middleware('admin')->prefix('admin')->group(function () {
    Route::post('/logout', [App\Http\Controllers\Admin\Auth\LogoutController::class, 'logout'])->name('admin.logout');
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
    Route::resource('task', App\Http\Controllers\Admin\TaskController::class, ['as' => 'admin']);
    Route::resource('setting', App\Http\Controllers\Admin\SettingController::class, ['as' => 'admin']);
});
