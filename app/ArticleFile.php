<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleFile extends Model
{
    protected $fillable=['image','img_text_ar','img_text_en','article_id'];
    public function articles(){
        return $this->belongsTo(Article::class);
    }
}
