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
    protected $primaryKey = "playlist_ID";

    protected $fillable = [
        'playlist_name', 'user_ID', 'playlist_slug'
    ];

    /**
     * Get the user that owns the playlist.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_ID');
    }

    /**
     * Get the songs for the playlist.
     */
    public function songs()
    {
        return $this->hasMany(PlaylistSong::class, 'playlist_ID');
    }
}
