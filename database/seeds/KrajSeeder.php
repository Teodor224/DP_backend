<?php

use Illuminate\Database\Seeder;

class KrajSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kraje')->insert([
            'nazov' => "Bratislavský Kraj",
            'krajina_id' => "1",
        ]);

        DB::table('kraje')->insert([
            'nazov' => "Trnavský Kraj",
            'krajina_id' => "1",
        ]);

        DB::table('kraje')->insert([
            'nazov' => "Trenčianský Kraj",
            'krajina_id' => "1",
        ]);

        DB::table('kraje')->insert([
            'nazov' => "Nitrianský Kraj",
            'krajina_id' => "1",
        ]);

        DB::table('kraje')->insert([
            'nazov' => "Žilinský Kraj",
            'krajina_id' => "1",
        ]);

        DB::table('kraje')->insert([
            'nazov' => "Bánskobystrický Kraj",
            'krajina_id' => "1",
        ]);

        DB::table('kraje')->insert([
            'nazov' => "Prešovský Kraj",
            'krajina_id' => "1",
        ]);


        DB::table('kraje')->insert([
            'nazov' => "Košiscký Kraj",
            'krajina_id' => "1",
        ]);

        DB::table('kraje')->insert([
            'nazov' => "Nemecký Kraj",
            'krajina_id' => "2",
        ]);

        DB::table('kraje')->insert([
            'nazov' => "Praha 1",
            'krajina_id' => "3",
        ]);

    }
}
