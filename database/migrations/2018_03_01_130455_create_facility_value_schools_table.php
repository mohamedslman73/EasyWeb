<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityValueSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('facility_value_schools')){
            Schema::create('facility_value_schools', function (Blueprint $table) {
                $table->increments('id');
                //foreign keys
                $table->unsignedInteger('facility_value_id');
                $table->foreign('facility_value_id')->references('id')
                    ->on('facility_values')->onDelete('cascade');

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
        Schema::dropIfExists('facility_value_schools');
    }
}
