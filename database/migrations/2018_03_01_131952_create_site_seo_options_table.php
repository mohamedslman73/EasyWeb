<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteSeoOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('site_seo_options')){
            Schema::create('site_seo_options', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->nullable();
                $table->text('meta_description_ar')->nullable();
                $table->text('meta_description_en')->nullable();
                $table->text('meta_keywords_ar')->nullable();
                $table->text('meta_keywords_en')->nullable();
                $table->text('social_description')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_seo_options');
    }
}
