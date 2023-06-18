<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    use HasFactory;
    public function languages()
    {
        return $this->belongsToMany(Languages::class);
    }
    public function genres()
    {
        return $this->belongsToMany(Genres::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
