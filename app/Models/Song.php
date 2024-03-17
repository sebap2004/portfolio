<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Album;
use App\Models\Genre;

class Song extends Model
{
    use HasFactory;

    protected $primaryKey = 'song_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'song_name', 'artist_name', 'song_directory', 'album_ID', 'genre_ID','cover_directory', 'artist_ID'
    ];

    /**
     * Get the album that owns the song.
     */

    /**
     * Get the genre that owns the song.
     */
    public function genre()
    {
        return $this->belongsTo('Genre', 'genre_ID');
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_ID');
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_ID');
    }
}
