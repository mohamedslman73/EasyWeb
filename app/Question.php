<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable=['username','email','question'];
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /*public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }*/
}
