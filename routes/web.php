<?php

use App\Http\Controllers\SessionsController;
use App\Livewire\AdminHomePage;
use App\Livewire\AdminManageSongs;
use App\Livewire\AdminManageUsers;
use App\Livewire\EditProfile;
use App\Livewire\LoginUser;
use App\Livewire\RegisterUser;
use App\Livewire\UploadSong;
use App\Livewire\ViewSongs;
use App\Livewire\ViewProfile;
use App\Models\Song;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout' ,[SessionsController::class, 'destroy'])->middleware('auth');
Route::post('sessions' ,[SessionsController::class, 'store'])->middleware('guest');

// App Routes
Route::get('app', ViewSongs::class)->middleware('auth');
Route::get('app/upload', UploadSong::class)->middleware('auth');

Route::get('login' ,LoginUser::class)->middleware('guest')->name('login');
Route::get('register', RegisterUser::class);

Route::get('profile/{user:username}', ViewProfile::class)->middleware('auth');

Route::get('profile/{user:username}/edit', EditProfile::class)->middleware('auth');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', AdminHomePage::class);
    Route::get('/admin/managesongs', AdminManageSongs::class);
    Route::get('/admin/manageusers', AdminManageUsers::class);
});


