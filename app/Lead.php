<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;
class Lead extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
//    protected $maxLoginAttempts = 3; // Amount of bad attempts user can make
//    protected $lockoutTime = 120; // Time for which user is going to be blocked in seconds
//
//    protected function hasTooManyLoginAttempts(Request $request)
//    {
//        return $this->limiter()->tooManyAttempts(
//            $this->throttleKey($request), 3,3
//        );
//    }
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
