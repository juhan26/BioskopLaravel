<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $fillable = ['movie_id', 'seat_id', 'dateshowtime_id'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }

    public function dateshowtime()
    {
        return $this->belongsTo(Dateshowtime::class, 'dateshowtime_id');
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
        
    }    
    public function studio()
    {
        return $this->belongsTo(Studio::class, 'studio_id');
    }
    



}
