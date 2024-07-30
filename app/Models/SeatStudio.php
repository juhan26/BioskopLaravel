<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeatStudio extends Model
{
    use HasFactory;

    public function seats(){
        $this->belongsTo(Seat::class, 'seat_id');
    }
    public function studios(){
        $this->belongsTo(Studio::class, 'studio_id');
    }
}
