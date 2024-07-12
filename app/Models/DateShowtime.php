<?php
// Dateshowtime.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dateshowtime extends Model
{
    protected $guarded = ['id'];

    public function date()
    {
        return $this->belongsTo(Date::class, 'date_id');
    }

    public function showtime()
    {
        return $this->belongsTo(Showtime::class, 'showtime_id');
    }

    public function movies()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
