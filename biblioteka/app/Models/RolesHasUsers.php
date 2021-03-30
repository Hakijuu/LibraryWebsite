<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesHasUsers extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'users_id',
        'roles_id',
    ];
}
