<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudJazykoveZnalosti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stud_jazykove_znalosti', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ais_id')->unsigned();
            $table->foreign('ais_id') ->references('id')->on('ais');
            $table->integer('jazykove_znalosti_id')->unsigned();
            $table->foreign('jazykove_znalosti_id') ->references('id')->on('jazykove_znalosti');
            $table->string('uroven',50);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stud_jazykove_znalosti');
    }
}
