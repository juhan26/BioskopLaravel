<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['movie_id', 'seat_id', 'dateshowtime_id'];

    public function seats(){
        return $this->belongsTo(Seat::class, 'seat_id'); //
    }
    public function dateshowtimes(){
        return $this->belongsTo(Dateshowtime::class, 'dateshowtime_id'); //
    }
    public function movie(){
        return $this->belongsTo(Movie::class, 'movie_id'); //
    }


}
