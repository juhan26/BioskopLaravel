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

  public function isBooked($movie, $dateshowtime)
{
  if (!$movie || !$dateshowtime) {
    return false; // Jika salah satu objek null, return false
}

        return $this->bookings()->where('movie_id', $movie->id)
                                ->where('dateshowtime_id', $dateshowtime->id)
                                ->exists();
}

}
