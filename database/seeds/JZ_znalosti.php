<?php

use Illuminate\Database\Seeder;

class JZ_znalosti extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jazykove_znalosti')->insert([
            'nazov' => "Anglický Jazyk",
        ]);

        DB::table('jazykove_znalosti')->insert([
            'nazov' => "Arabský Jazyk",
        ]);
        DB::table('jazykove_znalosti')->insert([
            'nazov' => "Čínsky Jazyk",
        ]);
        DB::table('jazykove_znalosti')->insert([
            'nazov' => "Český Jazyk",
        ]);
        DB::table('jazykove_znalosti')->insert([
            'nazov' => "Francúzsky Jazyk",
        ]);
        DB::table('jazykove_znalosti')->insert([
            'nazov' => "Japónsky Jazyk",
        ]);
        DB::table('jazykove_znalosti')->insert([
            'nazov' => "Kórejský Jazyk",
        ]);
        DB::table('jazykove_znalosti')->insert([
            'nazov' => "Maďarský jazyk",
        ]);
        DB::table('jazykove_znalosti')->insert([
            'nazov' => "Nemecký Jazyk",
        ]);
        DB::table('jazykove_znalosti')->insert([
            'nazov' => "Portugálsky Jazyk",
        ]);
        DB::table('jazykove_znalosti')->insert([
            'nazov' => "Ruský Jazyk",
        ]);
        DB::table('jazykove_znalosti')->insert([
            'nazov' => "Slovenský jazyk",
        ]);
        DB::table('jazykove_znalosti')->insert([
            'nazov' => "Španielský Jazyk",
        ]);
        DB::table('jazykove_znalosti')->insert([
            'nazov' => "Talianský Jazyk",
        ]);
    }
}
