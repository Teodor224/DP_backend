<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAisPonuka extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ziadosti', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status',20);
            $table->string('komentar',255)->default("");
            $table->integer('hodnotenie')->default(-1);
            $table->boolean("komentar_schvaleny")->default(false);
            $table->integer('ais_id')->unsigned();
            $table->foreign('ais_id') ->references('id')->on('ais');
            $table->integer('ponuka_id')->unsigned();
            $table->foreign('ponuka_id') ->references('id')->on('ponuky');
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
        Schema::dropIfExists('_ziadosti');
    }
}
