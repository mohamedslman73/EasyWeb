<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacilityType extends Model
{
    public function facility_values(){
        return $this->hasMany(FacilityValue::class);
    }
}
