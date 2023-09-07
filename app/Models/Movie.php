<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'desc', 'status', 'slug', 'image', 'cat_id', 'country_id', 'genre_id', 'movie_hot', 'resolution_id', 'subline', 'duration', 'tags', 'top_view', 'trailer', 'episode'];
    public function Genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id');
    }
    public function Category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    public function Country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
    public function Resolution()
    {
        return $this->belongsTo(Resolution::class, 'resolution_id');
    }
    public function Genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genres', 'movie_id', 'genre_id');
    }
    public function Cats()
    {
        return $this->belongsToMany(Category::class, 'movie_categories', 'movie_id', 'category_id');
    }
    public function Episodes()
    {
        return $this->hasMany(Episode::class, 'movie_id');
    }
    // public function movie_genre()
    // {
    //     return $this->belongsToMany(::class, 'movie_genres', 'movie_id', 'genre_id');
    // }
}
