<?php

use App\Http\Controllers\SessionsController;
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

Route::get('/login', function () {
    return view('login');
});

Route::get('logout' ,[SessionsController::class, 'destroy'])->middleware('auth');
Route::get('login' ,[SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sessions' ,[SessionsController::class, 'store'])->middleware('guest');

Route::get('/app', function () {
    return view('app');
})->middleware('auth');

Route::get('/register', function () {
    return view('register', [
        'title' => 'Register'
    ]);
});
