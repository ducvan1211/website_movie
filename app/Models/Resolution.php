<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resolution extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'desc',];
    public function Movies()
    {
        return $this->hasMany(Movie::class, 'resolution_id');
    }
}
