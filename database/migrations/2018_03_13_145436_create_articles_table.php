<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('articles')){
            Schema::create('articles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title_ar');
                $table->string('title_en');
                $table->string('logo');
                $table->text('text_ar');
                $table->text('text_en');
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
        Schema::dropIfExists('articles');
    }
}
