<?php

use Illuminate\Database\Seeder;

class Kontakt_OsobaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kontakt_osoba')->insert([
            'meno' => "Peter",
            'priezvisko' => "Testový_Firma",
            'email' => "Firma_Peter@gmail.com",
            'tel' => "+421000000000",
            'firma_id'=>"1",
        ]);

        DB::table('kontakt_osoba')->insert([
            'meno' => "Adam",
            'priezvisko' => "Novotný",
            'email' => "Adam_Novotny_Firma2@gmail.com",
            'tel' => "+421000000000",
            'firma_id'=>"2",
        ]);

        DB::table('kontakt_osoba')->insert([
            'meno' => "Erika",
            'priezvisko' => "Modrá",
            'email' => "Eika_Modrá_Firma3@gmail.com",
            'tel' => "+421000000003",
            'firma_id'=>"3",
        ]);

        DB::table('kontakt_osoba')->insert([
            'meno' => "Jozef",
            'priezvisko' => "Pestrý",
            'email' => "Jozef_Pestrý_Firma4@gmail.com",
            'tel' => "+421000000004",
            'firma_id'=>"4",
        ]);

        DB::table('kontakt_osoba')->insert([
            'meno' => "Juraj",
            'priezvisko' => "Mokrý",
            'email' => "JM_Firma5@gmail.com",
            'tel' => "+421000000005",
            'firma_id'=>"5",
        ]);

        DB::table('kontakt_osoba')->insert([
            'meno' => "Andrea",
            'priezvisko' => "Kolarová",
            'email' => "AK_Firma6@gmail.com",
            'tel' => "+421000000006",
            'firma_id'=>"6",
        ]);

        DB::table('kontakt_osoba')->insert([
            'meno' => "Ivan",
            'priezvisko' => "Letný",
            'email' => "IL_Firma7@gmail.com",
            'tel' => "+421000000007",
            'firma_id'=>"7",
        ]);

        DB::table('kontakt_osoba')->insert([
            'meno' => "Mariana",
            'priezvisko' => "Sklenná",
            'email' => "MS_Firma8@gmail.com",
            'tel' => "+421000000008",
            'firma_id'=>"8",
        ]);

        DB::table('kontakt_osoba')->insert([
            'meno' => "Richard",
            'priezvisko' => "Klapka",
            'email' => "EK_Firma9@gmail.com",
            'tel' => "+421000000009",
            'firma_id'=>"9",
        ]);

        DB::table('kontakt_osoba')->insert([
            'meno' => "Erik",
            'priezvisko' => "Hrušková",
            'email' => "EH_Firma10@gmail.com",
            'tel' => "+421000000010",
            'firma_id'=>"10",
        ]);

        DB::table('kontakt_osoba')->insert([
            'meno' => "Pavol",
            'priezvisko' => "Lavý",
            'email' => "PL_Firma11@gmail.com",
            'tel' => "+421000000011",
            'firma_id'=>"11",
        ]);



    }
}
