<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    protected $table = 'fees';
    protected $fillable=['name_ar','name_en','amount','unit','school_id'];

    public function school()
    {
        return $this->belongsTo(School::class,'school_id');
    }
}
