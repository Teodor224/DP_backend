<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAisFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ais_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_URL',100);
            $table->string('file',50);
            $table->boolean('isProfile');
            $table->integer('ais_id')->unsigned();
            $table->foreign('ais_id') ->references('id')->on('ais');
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
        Schema::dropIfExists('ais_files');
    }
}
