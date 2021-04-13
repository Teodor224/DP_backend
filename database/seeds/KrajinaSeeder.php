<?php

use Illuminate\Database\Seeder;

class KrajinaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('krajina')->insert([
            'nazov' => "Slovensko",
            'kontinent' => "Európa",
        ]);

        DB::table('krajina')->insert([
            'nazov' => "Nemecko",
            'kontinent' => "Európa",
        ]);

        DB::table('krajina')->insert([
            'nazov' => "Česko",
            'kontinent' => "Európa",
        ]);

    }
}
