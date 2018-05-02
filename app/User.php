<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


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
    public function getImageAttribute($url)
    {
        return ($url != "")?loadAsset('uploads/'.$url):null;
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class,'user_id');
    }
    public function userTokens()
    {
        return $this->hasMany(UserTokens::class, 'user_id');
    }
}
