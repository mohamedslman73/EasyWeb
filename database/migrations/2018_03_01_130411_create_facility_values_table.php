<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('facility_values')) {
            Schema::create('facility_values', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name_ar');
                $table->string('name_en');
                $table->boolean('status');
                //foreign keys
                $table->unsignedInteger('facility_type_id');
                $table->foreign('facility_type_id')->references('id')
                    ->on('facility_types')->onDelete('cascade');
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
        Schema::dropIfExists('facility_values');
    }
}
