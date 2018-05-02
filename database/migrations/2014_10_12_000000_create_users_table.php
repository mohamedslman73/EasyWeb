<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('users')){
            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('email')->unique();
                $table->string('password');


                $table->string('image')->nullable();
                $table->string('phone')->nullable();
                $table->string('ex_school')->nullable();
                $table->string('address')->nullable();
                $table->boolean('active')->default(0);
                $table->boolean('newsletter')->default(0);
                $table->tinyInteger('type');

/*              $table->text('activation_code')->nullable();*/

                $table->unsignedInteger('school_id')->nullable();
                $table->foreign('school_id')->references('id')
                    ->on('schools')->onDelete('cascade');

                $table->unsignedInteger('district_id')->nullable();
                $table->foreign('district_id')->references('id')
                    ->on('districts')->onDelete('cascade');


                $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
