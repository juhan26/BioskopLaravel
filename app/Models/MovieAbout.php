<?php

namespace App\Models;

use Endroid\QrCode\Builder\Builder;
use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class MovieAbout extends Model
{
    use HasFactory;
    protected $guarded= ['id'];
    
    public function movies() {
        return $this->belongsTo(Movie::class, 'movie_id');
}

public function booking() {
    return $this->belongsTo(Movie::class, 'movie_id');
}


public function scopeFilter(QueryBuilder $query, ?string  $search) {
    
    if ($search ?? false) {
        $query->where('name', 'like', '%' . $search . '%');
    }
    
}


}
