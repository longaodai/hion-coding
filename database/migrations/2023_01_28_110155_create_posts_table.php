<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('id')->autoIncrement();
            $table->string('post_title');
            $table->string('post_slug')->unique();
            $table->text('post_sub_description')->nullable();
            $table->text('post_description')->nullable();
            $table->string('post_image')->nullable();
            $table->integer('author_id')->nullable();
            $table->integer('category_id')->nullable();
            $table->tinyInteger('post_active');
            $table->tinyInteger('post_views')->nullable()->default(0);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
