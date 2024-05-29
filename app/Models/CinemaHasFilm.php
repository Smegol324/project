<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaHasFilm extends Model
{
    use HasFactory;
    protected $table = 'cinema_has_films';
    protected $guarded = false;
    public $incrementing = false;
    protected $primaryKey = null;
    public function film()
    {
        return $this->belongsTo(Film::class);
    }
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
