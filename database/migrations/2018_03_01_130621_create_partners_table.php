<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('partners')){
            Schema::create('partners', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name_ar');
                $table->string('name_en');
                $table->string('logo');
                $table->text('about_ar');
                $table->text('about_en');
                $table->string('facebook')->nullable();
                $table->string('youtube')->nullable();
                $table->string('instagram')->nullable();
                $table->string('linkedin')->nullable();
                $table->boolean('active');
                $table->string('slug_ar');
                $table->string('slug_en');
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
        Schema::dropIfExists('partners');
    }
}
