<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable=['username','email','question_id','answer'];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
