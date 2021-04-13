<?php

use Illuminate\Database\Seeder;

class ZiadostiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ziadosti')->insert([
            'status' => "V procese",
            'ais_id'=>"1",
            'ponuka_id'=>"1",
        ]);

        DB::table('ziadosti')->insert([
            'status' => "Prijatý",
            'komentar'=>"Veľmi dobrá firma s príjemným kolektívom.",
            'hodnotenie'=>"5",
            'ais_id'=>"1",
            'ponuka_id'=>"3",
            'komentar_schvaleny'=>true,
        ]);

        DB::table('ziadosti')->insert([
            'status' => "Prijatý",
            'komentar'=>"Dobrá skúsenosť",
            'hodnotenie'=>"5",
            'ais_id'=>"4",
            'ponuka_id'=>"15"
        ]);

        DB::table('ziadosti')->insert([
            'status' => "Prijatý",
            'komentar'=>"Super",
            'hodnotenie'=>"5",
            'ais_id'=>"5",
            'ponuka_id'=>"14"
        ]);

        DB::table('ziadosti')->insert([
            'status' => "Prijatý",
            'ais_id'=>"1",
            'ponuka_id'=>"10"
        ]);

    }
}
