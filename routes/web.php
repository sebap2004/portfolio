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


Route::post('sessions' ,[SessionsController::class, 'store'])->middleware('guest');

// App Routes


Route::get('login' ,LoginUser::class)->middleware('guest')->name('login');
Route::get('register', RegisterUser::class);


Route::group(['middleware' => 'auth'], function () {
    Route::get('app', ViewSongs::class)->name('app');
    Route::get('app/upload', UploadSong::class);
    Route::get('app/createalbum', \App\Livewire\CreateAlbum::class);
    Route::get('logout' ,[SessionsController::class, 'destroy']);
    Route::get('profile/{artist:username}', ViewProfile::class);
    Route::get('profile/{user:username}/edit', EditProfile::class);
    Route::get('album/{album:album_ID}', \App\Livewire\ViewAlbum::class);
    Route::get('playlist/{playlist:playlist_slug}', \App\Livewire\ViewPlaylist::class);
});


Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', AdminHomePage::class);
    Route::get('/admin/managesongs', AdminManageSongs::class);
    Route::get('/admin/manageusers', AdminManageUsers::class);
});


