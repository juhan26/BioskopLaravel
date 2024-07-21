<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function bookings()
    {
        return $this->hasMany(Booking::class); //
    }
    
    public function studios()
    {
        return $this->belongsToMany(Studio::class, 'studio_seat', 'seat_id', 'studio_id');
    }

    public function bookedseats(){
      return $this->hasMany(BookedSeat::class);
  }

  public function isBooked($movie, $dateshowtime)
{
        return $this->bookings()->where('movie_id', $movie)
                                ->where('dateshowtime_id', $dateshowtime)
                                ->exists();
}

}
