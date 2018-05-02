<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name_ar','name_en','slug_ar','slug_en'];

    public function cities(){
        return $this->hasmany(City::class);
    }

}
