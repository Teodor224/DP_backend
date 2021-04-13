<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProgram extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_program', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ais_id')->unsigned();
            $table->foreign('ais_id') ->references('id')->on('ais');
            $table->string('stupen',20);
            $table->integer('rocnik');
            $table->integer('studentske_programy_id')->unsigned();
            $table->foreign('studentske_programy_id') ->references('id')->on('studentske_programy');
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
        Schema::dropIfExists('student_program');
    }
}
