<?php

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/song/{songs:song_ID}', function ($songID) {
    $song = Song::findOrFail($songID);
    $song['cover_directory'] = Storage::url($song['cover_directory']);
    $song['song_directory'] = Storage::url($song['song_directory']);
    return $song;
});
