<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityValueSchool extends Model
{
    protected $fillable=['school_id','facility_value_id'];


    public function school(){
        return $this->belongsTo(School::class);
    }
    public function facility_value(){
        return $this->belongsTo(FacilityValue::class);
    }

}
