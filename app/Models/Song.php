<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'song_name', 'artist_name', 'database_link', 'album_ID', 'genre_ID',
    ];

    /**
     * Get the album that owns the song.
     */
    public function album()
    {
        return $this->belongsTo('App\Album', 'album_ID');
    }

    /**
     * Get the genre that owns the song.
     */
    public function genre()
    {
        return $this->belongsTo('App\Genre', 'genre_ID');
    }
}