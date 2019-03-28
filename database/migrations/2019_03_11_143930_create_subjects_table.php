<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('ocena')->nullable();
            $table->integer('semestar');
            $table->integer('user_id')->unsigned();
            $table->integer('kolokvijum')->default(0);
            $table->integer('seminarski')->default(0);
            $table->integer('aktivnost')->default(0);
            $table->foreign('user_id')->references('id')->on('students');
            $table->timestamps('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
