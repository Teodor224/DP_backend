<?php

use Illuminate\Database\Seeder;

class ZameranieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zameranie')->insert([
            'nazov' => "Programátor",
            'studentske_programy_id'=>"1"
        ]);

        DB::table('zameranie')->insert([
            'nazov' => "Grafik",
            'studentske_programy_id'=>"1"
        ]);

        DB::table('zameranie')->insert([
            'nazov' => "Všeobecná zdravotná sestra",
            'studentske_programy_id'=>"15"
        ]);
    }
}
