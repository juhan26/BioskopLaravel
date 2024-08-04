<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moviestudio extends Model
{
    use HasFactory;
    protected $guarded = 'id';

    public function movies(){
        return $this->belongsTo(Movie::class, 'movie_id');
    }
    public function studios(){
        return $this->belongsTo(Studio::class, 'studio_id');
    }
}
