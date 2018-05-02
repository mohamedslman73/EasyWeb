<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeoFixedPage extends Model
{
    protected $table = "seo_fixed_pages";

    protected $fillable = ["page","page_title_ar","page_title_en","meta_description_ar","meta_description_en",
        "meta_keywords_ar","meta_keywords_en","og_local","og_description","og_image",
        "twitter_card","twitter_description","twitter_image","og_type"];
}
