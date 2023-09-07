<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'desc', 'status', 'slug'];
    public function Movies()
    {
        return $this->hasMany(Movie::class, 'genre_id');
    }
    public function list_movie()
    {
        return $this->belongsToMany(Movie::class, 'movie_genres', 'genre_id', 'movie_id');
    }
}
