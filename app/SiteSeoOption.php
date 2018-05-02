<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSeoOption extends Model
{
    protected $table = "site_seo_options";

    protected $fillable = [
        "title",
        "meta_description_ar",
        "meta_description_en",
        "meta_keywords_ar",
        "meta_keywords_en",
        "social_description"];
}
