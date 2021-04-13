<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNapisteNam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('napiste_nam', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meno',25);
            $table->string('priezvisko',30);
            $table->string('email',50);
            $table->LONGTEXT('sprava');
            $table->boolean('nova_sprava')->default(true);
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
        Schema::dropIfExists('napiste_nam');
    }
}
