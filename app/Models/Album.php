<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'album_name',
    ];

    /**
     * Get the songs for the album.
     */
    public function songs()
    {
        return $this->hasMany('App\Song', 'album_ID');
    }
}
