<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title')->nullable();
            $table->string('link',1024)->nullable();
            $table->string('guid')->nullable();
            $table->string('category')->nullable();
            $table->string('creator')->nullable();
            $table->timestamp('pubDate')->nullable();
            $table->text('contentEncoded')->nullable();
            $table->string('image_url')->nullable();
            $table->string('first_paragraph',512)->nullable();
            $table->string('credit')->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
