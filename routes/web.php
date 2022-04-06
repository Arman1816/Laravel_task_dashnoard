<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Home;
use App\Http\Livewire\Task;
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

Route::view('/', 'welcome')->name('home');
Route::get('password/reset', Email::class)->name('password.request');
Route::get('password/reset/{token}', Reset::class)->name('password.reset');

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
    Route::get('register', Register::class)->name('register');
});


Route::middleware('auth')->group(function () {
    Route::get('dashboard', Home::class)->name('dashboard');
    Route::get('start-task/{taskId}', Task::class)->name('start.task');
    Route::get('email/verify', Verify::class)->middleware('throttle:6,1')->name('verification.notice');
    Route::get('password/confirm', Confirm::class)->name('password.confirm');
    Route::post('logout', LogoutController::class)->name('logout');
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
