<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable=['name_ar','name_en','slug_ar','slug_en','city_id','show'];

    public function city(){
        return $this->belongsTo(City::class);
    }
    public function schools(){
        return $this->hasMany(School::class);
    }
    public function seo(){
        return $this->hasOne(SeoDistricts::class,'district_id')->latest()   ;
    }
}
