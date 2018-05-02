<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable=['name','text_ar','text_en','page_name'];

}
