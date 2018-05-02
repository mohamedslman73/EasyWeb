<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTokens extends Model
{
    protected $table    = "user_tokens";
    protected $fillable = ["user_id","api_token","device_token","last_activity"];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
