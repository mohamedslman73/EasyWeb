<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comments";
    protected $fillable = ["user_id","comment_content","replay_id","school_id"];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function replays()
    {
        return $this->hasMany(Replay::class,'comment_id','id');
    }
}
