<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meno',30);
            $table->string('priezvisko',45);
            $table->string('skolsky_email',50)->unique();
            $table->string('sukromny_email',50)->default("");
            $table->string('login_ID',20)->unique();
            $table->string('heslo');
            $table->date('datum_narodenia');
            $table->string('tel_cislo',30);
            $table->integer('rola_id')->unsigned();
            $table->foreign('rola_id') ->references('id')->on('rola');
            $table->integer('krajina_id')->unsigned();
            $table->foreign('krajina_id') ->references('id')->on('krajina');
            $table->integer('kraj_id')->unsigned();
            $table->foreign('kraj_id') ->references('id')->on('kraje');
            $table->string('mesto',30);
            $table->string('ulica',50);
            $table->string('vzdelanie',50);
            $table->LONGTEXT('informacie');
            $table->string('api_token',255);
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
        Schema::dropIfExists('_ais');
    }
}
