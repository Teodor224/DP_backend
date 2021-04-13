<?php

use Illuminate\Database\Seeder;

class Stud_Jazykove_Znalosti extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stud_jazykove_znalosti')->insert([
            'jazykove_znalosti_id' => "12",
            'uroven' => "Materinský Jazyk",
            'ais_id'=>"1"
        ]);

        DB::table('stud_jazykove_znalosti')->insert([
            'jazykove_znalosti_id' => "1",
            'uroven' => "Expert (C2)",
            'ais_id'=>"1"
        ]);

        DB::table('stud_jazykove_znalosti')->insert([
            'jazykove_znalosti_id' => "5",
            'uroven' => "Začiatočník (A2)",
            'ais_id'=>"1"
        ]);

    }
}
