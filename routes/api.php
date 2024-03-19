<?php

use App\Models\Album;
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

Route::get('/album/{albums:album_ID}', function ($albumID) {
    $album = Album::findOrFail($albumID);

    $songIds = $album->songs()->pluck('song_ID')->toArray();
    return response()->json(['song_ids' => $songIds]);
});


Route::get('/playlist/{playlists:playlist_ID}', function ($playlistID) {
    $playlist = \App\Models\Playlist::findOrFail($playlistID);

    $songIds = $playlist->songs->pluck('song_ID')->toArray();
    return response()->json(['song_ids' => $songIds]);
});
