<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Showtime extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function dateshowtimes(){
        return $this->hasMany(Dateshowtime::class); //
    }
    public function getTimeAttribute($value)
    {
        return Carbon::parse($value)->format('H:i:s');
    }
}
