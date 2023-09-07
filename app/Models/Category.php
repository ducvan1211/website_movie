<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'desc', 'status', 'slug'];
    public function Movies()
    {
        return $this->hasMany(Movie::class, 'cat_id');
    }
    public function list_movie()
    {
        return $this->belongsToMany(Movie::class, 'movie_categories', 'category_id', 'movie_id');
    }
}
