<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Date extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    public function dateshowtimes()
    {
        return $this->hasMany(Dateshowtime::class);
    }
    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('l, j F Y');
    }
    public function movies()
    {
        return $this->belongsTo(Movie::class, 'date_movie');
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    /**
     * Many to many relation to Showtime model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    // public function showtimes(): BelongsToMany
    // {
    //     return $this->belongsToMany(Showtime::class)->using(DateShowtime::class);
    // }

    /**
     * Many to many relation to Movie model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
}
