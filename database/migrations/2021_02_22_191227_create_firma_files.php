<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmaFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firma_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_URL',100);
            $table->string('file',50);
            $table->boolean('isProfile');
            $table->integer('firma_id')->unsigned();
            $table->foreign('firma_id') ->references('id')->on('firma');
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
        Schema::dropIfExists('firma_files');
    }
}
