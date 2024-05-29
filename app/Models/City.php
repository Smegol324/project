<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'cities';
    protected $guarded = false;
    public function cinemas()
    {
        return $this->hasMany(Cinema::class);
    }
}
