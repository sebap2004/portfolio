<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres'; // Specify the table name if it's different from the model's pluralized lowercase name
    protected $primaryKey = 'genre_ID'; // Specify the primary key if it's different from the default 'id' column

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'genre_name',
    ];

    /**
     * Get the songs for the genre.
     */
    public function songs()
    {
        return $this->hasMany('App\Song', 'genre_ID');
    }
}

