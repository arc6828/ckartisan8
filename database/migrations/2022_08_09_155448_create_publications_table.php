<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('authors')->nullable();
            $table->text('title')->nullable();
            $table->text('publisher')->nullable();
            $table->integer('date')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            $table->string('pages')->nullable();
            $table->string('type')->nullable();
            $table->string('language')->nullable();
            $table->string('city')->nullable();     //Conference Only
            $table->text('place')->nullable();      //Conference Only
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publications');
    }
}
