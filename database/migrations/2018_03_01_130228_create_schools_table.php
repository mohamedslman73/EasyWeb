<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('schools')){
            Schema::create('schools', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name_ar')->nullable();
                $table->string('name_en')->nullable();
                $table->string('logo')->nullable();
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
                $table->string('website')->nullable();
                $table->string('facebook')->nullable();
                $table->string('instagram')->nullable();
                $table->string('linkedin')->nullable();
                $table->string('youtube')->nullable();
                $table->string('google+')->nullable();
                $table->string('admission_url')->nullable();
                $table->date('admission_date')->nullable();
                $table->text('address_ar')->nullable();
                $table->text('address_en')->nullable();
                $table->text('about_ar')->nullable();
                $table->text('about_en')->nullable();
                $table->string('student_num')->nullable();
                $table->boolean('active')->default(0);
                $table->boolean('verified')->default(0);
                $table->boolean('show')->default(0);
                $table->double('longitude')->nullable();
                $table->double('latitude')->nullable();
                $table->string('slug_ar')->nullable();
                $table->string('slug_en')->nullable();
                //foreign keys
                $table->unsignedInteger('district_id');
                $table->foreign('district_id')->references('id')
                    ->on('districts')->onDelete('cascade');

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
        Schema::dropIfExists('schools');
    }
}
