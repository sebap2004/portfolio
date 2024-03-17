<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $table = 'artists';

    protected $primaryKey = 'artist_ID';

    protected $fillable = [
        'name',
        'username',
        'bio',
        'user_ID',
        'pfp_directory'// Assuming this is the foreign key for the user
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_ID', 'user_ID');
    }

    public function songs()
    {
        return $this->hasMany(Song::class, 'artist_ID');
    }

    public function albums()
    {
        return $this->hasMany(Album::class, 'artist_ID');
    }

}
