<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'playlist_name', 'user_ID',
    ];

    /**
     * Get the user that owns the playlist.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_ID');
    }

    /**
     * Get the songs for the playlist.
     */
    public function songs()
    {
        return $this->belongsToMany('App\Song', 'playlist_songs', 'playlist_ID', 'song_ID');
    }
}
