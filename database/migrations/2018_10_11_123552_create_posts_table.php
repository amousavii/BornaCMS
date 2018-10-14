<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('img_id')->unsigned();
            $table->integer('user_id')->unsigned();
//            $table->integer('cat_id')->unsigned();
            $table->string('title');
            $table->text('content');
            $table->string('status');
            $table->timestamps();
            //Delete A User Also Deletes All Its Posts
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
