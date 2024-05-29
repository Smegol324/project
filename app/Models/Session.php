<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $table = 'sessions';
    protected $guarded = false;
    public function film()
    {
        return $this->belongsTo(Film::class);
    }
    public function cinema()
    {
        return $this->belongsTo(Cinema::class);
    }
    public function places()
    {
        return $this->HasMany(Place::class);
    }
}
