<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolaSeeder::class);
        $this->call(KrajinaSeeder::class);
        $this->call(KrajSeeder::class);
        $this->call(FakultySeeder::class);
        $this->call(Stud_ProgramySeeder::class);
        $this->call(AisSeeder::class);
        $this->call(FirmaSeeder::class);
        $this->call(ZameranieSeeder::class);
        $this->call(PonukaSeeder::class);
        $this->call(Kontakt_OsobaSeeder::class);
        $this->call(JZ_znalosti::class);
        $this->call(PC_znalosti::class);
        $this->call(Student_ProgramSeeder::class);
        $this->call(ais_filesSeeder::class);
        $this->call(firma_filesSeeder::class);
        $this->call(Stud_Jazykove_Znalosti::class);
        $this->call(Stud_Pc_Znalosti::class);
        $this->call(ZiadostiSeeder::class);
    }
}
