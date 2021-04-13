<?php

use Illuminate\Database\Seeder;

class Stud_Pc_Znalosti extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stud_pc_znalosti')->insert([
            'pc_znalosti_id' => "1",
            'uroven' => "Expert",
            'ais_id'=>"1"
        ]);

        DB::table('stud_pc_znalosti')->insert([
            'pc_znalosti_id' => "2",
            'uroven' => "Expert",
            'ais_id'=>"1"
        ]);

        DB::table('stud_pc_znalosti')->insert([
            'pc_znalosti_id' => "3",
            'uroven' => "Expert",
            'ais_id'=>"1"
        ]);

        DB::table('stud_pc_znalosti')->insert([
            'pc_znalosti_id' => "43",
            'uroven' => "Expert",
            'ais_id'=>"1"
        ]);

        DB::table('stud_pc_znalosti')->insert([
            'pc_znalosti_id' => "62",
            'uroven' => "Pokročilý",
            'ais_id'=>"1"
        ]);

        DB::table('stud_pc_znalosti')->insert([
            'pc_znalosti_id' => "28",
            'uroven' => "Základy",
            'ais_id'=>"1"
        ]);


    }
}
