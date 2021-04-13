<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudPcZnalosti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stud_pc_znalosti', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ais_id')->unsigned();
            $table->foreign('ais_id') ->references('id')->on('ais');
            $table->integer('pc_znalosti_id')->unsigned();
            $table->foreign('pc_znalosti_id') ->references('id')->on('pc_znalosti');
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
        Schema::dropIfExists('stud_pc_znalosti');
    }
}
