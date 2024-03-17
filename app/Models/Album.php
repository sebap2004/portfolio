<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $primaryKey = "album_ID";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'album_name',
        'album_slug',
        'cover_directory',
        'artist_ID'
    ];

    /**
     * Get the songs for the album.
     */
    public function songs()
    {
        return $this->hasMany(Song::class, "album_ID");
    }

    public function artist()
    {
        return $this->belongsTo(Artist::class, 'artist_ID');
    }
}
