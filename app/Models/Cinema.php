<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cinema extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cinemas';
    protected $guarded = false;
    public function cinemaHasFilms()
    {
        return $this->hasMany(CinemaHasFilm::class);
    }
}
