<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable=['title_ar','title_en','logo','text_ar','text_en'];
    public function article_files()
    {
        return $this->hasMany(ArticleFile::Class);
    }
}
