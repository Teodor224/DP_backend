<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZameranie extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zameranie', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazov',50);
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
        Schema::dropIfExists('_zameranie');
    }
}
