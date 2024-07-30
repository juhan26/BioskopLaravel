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
        return $this->hasMany(Seat::class);
    }
    
    public function movies(){
        return $this->hasMany(Movie::class);
    }
    public function showtime(){
        return $this->hasMany(Movie::class);
    }
    public function seatStudio(){
        return $this->belongsTo(SeatStudio::class);
    }



    
}
