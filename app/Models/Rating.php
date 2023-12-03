<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'movie_id', 'rating'];

    public function movie() {
        return $this->hasOne(Movie::class,'id', 'movie_id');
    }
}
