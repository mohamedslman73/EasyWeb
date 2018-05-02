<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolGalleryImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('school_gallery_images')){
            Schema::create('school_gallery_images', function (Blueprint $table) {
                $table->increments('id');
                $table->string('url');
                //foreign keys
                $table->unsignedInteger('school_id');
                $table->foreign('school_id')->references('id')
                    ->on('schools')->onDelete('cascade');
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
        Schema::dropIfExists('school_gallery_images');
    }
}
