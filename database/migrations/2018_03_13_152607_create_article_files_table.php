<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('article_files')){

            Schema::create('article_files', function (Blueprint $table) {
                $table->increments('id');
                $table->string('image');
                $table->text('img_text_ar');
                $table->text('img_text_en');

                //foreign keys
                $table->integer('article_id')->unsigned();
                $table->foreign('article_id')->references('id')
                    ->on('articles')->onDelete('cascade');
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
        Schema::dropIfExists('article_files');
    }
}
