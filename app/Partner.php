<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable=['name_ar',
        'name_en',
        'logo',
        'about_ar',
        'about_en',
        'facebook',
        'youtube',
        'instagram',
        'linkedin',
        'active',
        'slug_ar',
        'slug_en'];

}
