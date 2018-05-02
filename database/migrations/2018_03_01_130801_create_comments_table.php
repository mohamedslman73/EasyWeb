<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('comments')){
            Schema::create('comments', function (Blueprint $table) {
                $table->increments('id');
                $table->text('text');
                $table->integer('school_id')->unsigned();
                $table->integer('user_id')->unsigned();
                $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
//                $table->foreign('replay_id')->references('id')->on('replays')->onDelete('cascade');
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
        Schema::dropIfExists('comments');
    }
}
