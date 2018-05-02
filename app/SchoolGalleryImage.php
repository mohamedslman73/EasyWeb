<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolGalleryImage extends Model
{
    protected $fillable=['url','school_id'];
    protected $hidden=['school_id'];

    public function school(){
        return $this->belongsTo(School::class);
    }
    public function getUrlAttribute($url)
    {
        return ($url != "")?loadAsset('uploads/'.$url):null;
    }
}
