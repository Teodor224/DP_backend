<?php

use Illuminate\Database\Seeder;

class RolaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rola')->insert([
            'nazov' => "student",
        ]);

        DB::table('rola')->insert([
            'nazov' => "zamestnanec",
        ]);

        DB::table('rola')->insert([
            'nazov' => "admin",
        ]);

        DB::table('rola')->insert([
            'nazov' => "firma",
        ]);
    }
}
