<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function seats()
    {
        return $this->belongsToMany(Seat::class, 'studio_seat', 'studio_id', 'seat_id');
    }
    public function movies(){
        return $this->hasMany(Movie::class);
    }
}
