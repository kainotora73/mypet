<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;


class User extends Model implements UserContract
{
    use Authenticatable;
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
