<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePonuka extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ponuky', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nazov',50);
            $table->LONGTEXT('informacie');
            $table->date('datum_od');
            $table->date('datum_do');
            $table->float('mzda');
            $table->integer('firma_id')->unsigned();
            $table->foreign('firma_id') ->references('id')->on('firma');
            $table->integer('krajina_id')->unsigned();
            $table->foreign('krajina_id') ->references('id')->on('krajina');
            $table->integer('kraj_id')->unsigned();
            $table->foreign('kraj_id') ->references('id')->on('kraje');
            $table->string('mesto',30);
            $table->integer('program_id')->unsigned();
            $table->foreign('program_id') ->references('id')->on('studentske_programy');
            $table->integer('zameranie_id')->unsigned();
            $table->foreign('zameranie_id') ->references('id')->on('zameranie');
            $table->boolean('je_aktualna')->default(true);
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
        Schema::dropIfExists('_ponuky');
    }
}
