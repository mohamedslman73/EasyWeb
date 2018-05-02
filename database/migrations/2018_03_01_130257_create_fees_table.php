<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('fees')) {
            Schema::create('fees', function (Blueprint $table) {
                $table->increments('id');
                $table->increments('id');
                $table->string('name_ar');
                $table->string('name_en');
                $table->double('amount');
                $table->string('unit');
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
        Schema::dropIfExists('fees');
    }
}
