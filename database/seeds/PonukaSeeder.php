<?php

use Illuminate\Database\Seeder;

class PonukaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ponuky')->insert([
            'nazov' => "Grafik",
            'informacie' => "Hľadáme Grafika",
            'datum_od' => "2020-01-01",
            'datum_do' => "2021-12-12",
            'mzda'=>"5.50",
            'mesto'=>"Nitra",
            'krajina_id'=>"1",
            'kraj_id'=>"4",
            'firma_id'=>"1",
            'program_id'=>"1",
            'zameranie_id'=>"2",
            'je_aktualna'=>true
        ]);

        DB::table('ponuky')->insert([
            'nazov' => "Programátor",
            'informacie' => "Hľadáme programátora",
            'datum_od' => "2020-01-01",
            'datum_do' => "2021-12-12",
            'mzda'=>"5.50",
            'mesto'=>"Bratislava",
            'krajina_id'=>"1",
            'kraj_id'=>"1",
            'firma_id'=>"1",
            'program_id'=>"1",
            'zameranie_id'=>"1",
            'je_aktualna'=>true
        ]);

        DB::table('ponuky')->insert([
            'nazov' => "Grafik",
            'informacie' => "Hľadáme Grafika",
            'datum_od' => "2020-01-01",
            'datum_do' => "2020-12-12",
            'mzda'=>"5.50",
            'mesto'=>"Praha",
            'krajina_id'=>"3",
            'kraj_id'=>"9",
            'firma_id'=>"1",
            'program_id'=>"1",
            'zameranie_id'=>"2",
            'je_aktualna'=>false
        ]);


        DB::table('ponuky')->insert([
            'nazov' => "Programátor",
            'informacie' => "Hľadáme Programátora",
            'datum_od' => "2021-05-06",
            'datum_do' => "2021-12-06",
            'mzda'=>"6.00",
            'mesto'=>"Bratislava",
            'krajina_id'=>"1",
            'kraj_id'=>"1",
            'firma_id'=>"3",
            'program_id'=>"1",
            'zameranie_id'=>"1",
            'je_aktualna'=>true
        ]);

        DB::table('ponuky')->insert([
            'nazov' => "Programátor",
            'informacie' => "Hľadáme Programátora",
            'datum_od' => "2021-04-23",
            'datum_do' => "2021-11-30",
            'mzda'=>"6.00",
            'mesto'=>"Trnava",
            'krajina_id'=>"1",
            'kraj_id'=>"2",
            'firma_id'=>"4",
            'program_id'=>"1",
            'zameranie_id'=>"1",
            'je_aktualna'=>true
        ]);

        DB::table('ponuky')->insert([
            'nazov' => "Programátor",
            'informacie' => "Hľadáme Programátora",
            'datum_od' => "2021-01-01",
            'datum_do' => "2021-12-24",
            'mzda'=>"5.00",
            'mesto'=>"Trenčín",
            'krajina_id'=>"1",
            'kraj_id'=>"3",
            'firma_id'=>"4",
            'program_id'=>"1",
            'zameranie_id'=>"1",
            'je_aktualna'=>true
        ]);

        DB::table('ponuky')->insert([
            'nazov' => "Programátor",
            'informacie' => "Hľadáme Programátora",
            'datum_od' => "2021-03-05",
            'datum_do' => "2022-03-05",
            'mzda'=>"5.50",
            'mesto'=>"Nitra",
            'krajina_id'=>"1",
            'kraj_id'=>"4",
            'firma_id'=>"7",
            'program_id'=>"1",
            'zameranie_id'=>"1",
            'je_aktualna'=>true
        ]);

        DB::table('ponuky')->insert([
            'nazov' => "Grafik",
            'informacie' => "Hľadáme Grafika",
            'datum_od' => "2021-01-01",
            'datum_do' => "2023-01-01",
            'mzda'=>"7.00",
            'mesto'=>"Košice",
            'krajina_id'=>"1",
            'kraj_id'=>"8",
            'firma_id'=>"6",
            'program_id'=>"1",
            'zameranie_id'=>"2",
            'je_aktualna'=>true
        ]);

        DB::table('ponuky')->insert([
            'nazov' => "Programátor",
            'informacie' => "Hľadáme Programátora",
            'datum_od' => "2021-01-01",
            'datum_do' => "2025-01-01",
            'mzda'=>"6.00",
            'mesto'=>"Prešov",
            'krajina_id'=>"1",
            'kraj_id'=>"7",
            'firma_id'=>"5",
            'program_id'=>"1",
            'zameranie_id'=>"1",
            'je_aktualna'=>true
        ]);

        DB::table('ponuky')->insert([
            'nazov' => "Grafik",
            'informacie' => "Hľadáme Grafika",
            'datum_od' => "2021-04-20",
            'datum_do' => "2021-08-20",
            'mzda'=>"4.50",
            'mesto'=>"Bánska Bystrica",
            'krajina_id'=>"1",
            'kraj_id'=>"6",
            'firma_id'=>"6",
            'program_id'=>"1",
            'zameranie_id'=>"2",
            'je_aktualna'=>true
        ]);

        DB::table('ponuky')->insert([
            'nazov' => "Programátor",
            'informacie' => "Hľadáme Programátora",
            'datum_od' => "2021-02-01",
            'datum_do' => "2021-03-01",
            'mzda'=>"7.50",
            'mesto'=>"Bratislava",
            'krajina_id'=>"1",
            'kraj_id'=>"1",
            'firma_id'=>"7",
            'program_id'=>"1",
            'zameranie_id'=>"1",
            'je_aktualna'=>true
        ]);

        DB::table('ponuky')->insert([
            'nazov' => "Grafik",
            'informacie' => "Hľadáme Grafika",
            'datum_od' => "2021-01-01",
            'datum_do' => "2022-01-01",
            'mzda'=>"5.00",
            'mesto'=>"Nitra",
            'krajina_id'=>"1",
            'kraj_id'=>"4",
            'firma_id'=>"8",
            'program_id'=>"1",
            'zameranie_id'=>"2",
            'je_aktualna'=>true
        ]);

        DB::table('ponuky')->insert([
            'nazov' => "Programátor",
            'informacie' => "Hľadáme Programátora",
            'datum_od' => "2021-06-05",
            'datum_do' => "2021-10-05",
            'mzda'=>"5.50",
            'mesto'=>"Trnava",
            'krajina_id'=>"1",
            'kraj_id'=>"2",
            'firma_id'=>"9",
            'program_id'=>"1",
            'zameranie_id'=>"1",
            'je_aktualna'=>true
        ]);

        DB::table('ponuky')->insert([
            'nazov' => "Grafik",
            'informacie' => "Hľadáme Grafika",
            'datum_od' => "2021-06-05",
            'datum_do' => "2021-10-05",
            'mzda'=>"5.50",
            'mesto'=>"Trnava",
            'krajina_id'=>"1",
            'kraj_id'=>"2",
            'firma_id'=>"9",
            'program_id'=>"1",
            'zameranie_id'=>"2",
            'je_aktualna'=>true
        ]);

        DB::table('ponuky')->insert([
            'nazov' => "Programátor",
            'informacie' => "Hľadáme Programátora",
            'datum_od' => "2020-05-01",
            'datum_do' => "2020-09-01",
            'mzda'=>"5.50",
            'mesto'=>"Bratislava",
            'krajina_id'=>"1",
            'kraj_id'=>"1",
            'firma_id'=>"1",
            'program_id'=>"1",
            'zameranie_id'=>"2",
            'je_aktualna'=>false
        ]);




    }
}
