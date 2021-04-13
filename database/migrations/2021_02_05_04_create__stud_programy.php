<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudProgramy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentske_programy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazov',100);
            $table->integer('fakulty_id')->unsigned();
            $table->foreign('fakulty_id') ->references('id')->on('fakulty');
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
        Schema::dropIfExists('studentske_programy');
    }
}
