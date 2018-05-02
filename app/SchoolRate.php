<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolRate extends Model
{
    protected $table = "school_rates";
    protected $fillable=['user_id', 'school_id', 'rate'];
}
