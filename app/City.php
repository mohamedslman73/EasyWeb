<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable=['name_ar','name_en','slug_ar','slug_en','country_id'];

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function districts(){
        return $this->hasMany(District::class);
    }

}
