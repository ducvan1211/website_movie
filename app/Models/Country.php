<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'desc', 'status', 'slug'];
    public function Movies()
    {
        return $this->hasMany(Movie::class, 'country_id');
    }
}
