<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirma extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firma', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email',50)->unique();
            $table->string('heslo');
            $table->string('nazov',50);
            $table->string('ico',50);
            $table->LONGTEXT('informacie');
            $table->integer('krajina_id')->unsigned();
            $table->foreign('krajina_id') ->references('id')->on('krajina');
            $table->integer('kraj_id')->unsigned();
            $table->foreign('kraj_id') ->references('id')->on('kraje');
            $table->string('mesto',50);
            $table->string('psc',15);
            $table->string('ulica',50);
            $table->string('tel',30);
            $table->string('web',30);
            $table->integer('rola_id')->unsigned();
            $table->foreign('rola_id') ->references('id')->on('rola');
            $table->boolean('je_schvalena')->default(false);
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
        Schema::dropIfExists('firma');
    }
}
