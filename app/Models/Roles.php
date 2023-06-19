<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class, 'roles_user', 'roles_id', 'users_id');
    }
}
