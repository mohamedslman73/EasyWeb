<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityValue extends Model
{
    protected $fillable=['name_ar','name_en','status','facility_type_id'];


    public function facility_type(){
        return $this->belongsTo(FacilityType::class,'facility_type_id');
    }

    public function school(){
        return $this->belongsToMany(School::class,'facility_value_schools');
    }

    public function facility_value_schools(){
        return $this->hasMany(FacilityValueSchool::class);
    }
}
