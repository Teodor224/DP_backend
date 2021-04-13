<?php

use Illuminate\Database\Seeder;

class FakultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fakulty')->insert([
            'nazov' => "Fakulta prírodných vied",
            'mesto' => "Nitra",
            'ulica' => "Tr. A. Hlinku 1",
        ]);

        DB::table('fakulty')->insert([
            'nazov' => "Fakulta sociálnych vied a zdravotníctva",
            'mesto' => "Nitra",
            'ulica' => "Kraskova 1",
        ]);

        DB::table('fakulty')->insert([
            'nazov' => "Fakulta stredoeurópskych štúdií",
            'mesto' => "Nitra",
            'ulica' => "Dražovská cesta 4",
        ]);

        DB::table('fakulty')->insert([
            'nazov' => "Filozofická fakulta",
            'mesto' => "Nitra",
            'ulica' => "Štefánikova 67",
        ]);

        DB::table('fakulty')->insert([
            'nazov' => "Pedagogická fakulta",
            'mesto' => "Nitra",
            'ulica' => "Dražovská cesta 4",
        ]);
    }
}
