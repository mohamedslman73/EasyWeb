<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compare extends Model
{
    protected $fillable = ["user_id","school_id"];

    public function school()
    {
        return $this->belongsTo(School::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
