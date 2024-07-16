<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function studios()
    {
        return $this->hasMany(Studio::class); //
    }

  public function isBooked($movie, $dateshowtime)
{
        // return $this->bookings()->where('movie_id', $movie->id)
        //                         ->where('dateshowtime_id', $dateshowtime->id)
        //                         ->exists();
}

}
