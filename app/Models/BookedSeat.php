<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedSeat extends Model
{
    use HasFactory;
    protected $fillable = ['booking_id', 'seat_id'];

    public function bookings(){
        return $this->belongsTo(Booking::class, 'booking_id'); //
    }
    public function seats(){
        return $this->belongsTo(Seat::class, 'seat_id'); //
    }
}
