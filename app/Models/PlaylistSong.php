<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaylistSong extends Model
{
    use HasFactory;
    public $timestamps = false;

    // Define the table name
    protected $table = 'playlist_songs';
    protected $primaryKey = ['playlist_ID', 'song_ID'];

    public $incrementing = false;

    protected $fillable = [
        'playlist_ID',
        'song_ID',
    ];

    public function playlist()
    {
        return $this->belongsTo(Playlist::class, 'playlist_ID', 'playlist_ID');
    }

    public function song()
    {
        return $this->belongsTo(Song::class, 'song_ID', 'song_ID');
    }
}
