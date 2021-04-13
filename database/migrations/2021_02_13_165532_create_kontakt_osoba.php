<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontaktOsoba extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontakt_osoba', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('firma_id')->unsigned();
            $table->foreign('firma_id') ->references('id')->on('firma');
            $table->string('meno',50);
            $table->string('priezvisko',50);
            $table->string('tel',50);
            $table->string('email',50);
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
        Schema::dropIfExists('kontakt_osoba');
    }
}
