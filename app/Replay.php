<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Replay extends Model
{
    protected $table ="replays";
    protected $fillable = ["user_id","comment_id","replay_content"];

    public function comment()
    {
        return $this->belongsTo(Comment::class,'comment_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
