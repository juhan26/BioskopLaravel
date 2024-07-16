<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Studio extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function seats(){
        return $this->belongsTo(Seat::class, 'seat_id');
    }
}
