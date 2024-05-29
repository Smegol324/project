<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityHasCinema extends Model
{
    use HasFactory;
    protected $table = 'city_has_cinemas';
    protected $guarded = false;
}
