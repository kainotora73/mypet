<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use App\Notifications\UserResetPassword;
use App\Notifications\PasswordResetNotification;


class User extends Model implements UserContract,CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function sendPasswordResetNotification($token){
        $this->notify(new PasswordResetNotification($token));
    }
}
