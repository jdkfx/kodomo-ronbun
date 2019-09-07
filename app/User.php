<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\PasswordResetNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_detail(){
        return $this->hasOne('App\UserDetail');
    }

    public function report(){
        return $this->hasMany('App\Report');
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }
}
