<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dateshowtime extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function dates(){
        return $this->belongsTo(Date::class, 'date_id');
    }
}
