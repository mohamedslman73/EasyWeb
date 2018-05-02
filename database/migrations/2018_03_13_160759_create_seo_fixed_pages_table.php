<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoFixedPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('seo_fixed_pages')){

            Schema::create('seo_fixed_pages', function (Blueprint $table) {
                $table->increments('id');
                $table->text('page');
                $table->string('page_title_ar')->nullable();
                $table->string('page_title_en')->nullable();
                $table->text('meta_description_ar')->nullable();
                $table->text('meta_description_en')->nullable();
                $table->text('meta_keywords_ar')->nullable();
                $table->text('meta_keywords_en')->nullable();
                $table->string('og_local')->nullable();
                $table->string('og_type')->nullable();
                $table->text('og_description')->nullable();
                $table->string('og_image')->nullable();
                $table->string('twitter_card')->nullable();
                $table->text('twitter_description')->nullable();
                $table->string('twitter_image')->nullable();
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
        Schema::dropIfExists('seo_fixed_pages');
    }
}
