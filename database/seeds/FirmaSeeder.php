<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirmaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('firma')->insert([
            'email' => "Zamestnanec1@gmail.com",
            'heslo' => Hash::make('test'),
            'nazov' => "TEST S.R.O",
            'ico' => "ICO Test",
            'informacie' => "Testová organizácia",
            'krajina_id'=>"1",
            'kraj_id'=>"4",
            'mesto'=>"Nitra",
            'psc'=>"9490",
            'ulica' => "Testová 34",
            'tel' => "+421900123456",
            'web' => "web.sk",
            'api_token'=>sha1(time()),
            'rola_id'=>"4",
            'je_schvalena'=>true,
        ]);

        DB::table('firma')->insert([
            'email' => "Firma2@gmail.com",
            'heslo' => Hash::make('test'),
            'nazov' => "Firma 2 S.R.O",
            'ico' => "ICO Test",
            'informacie' => "Firma 2 Informacie",
            'krajina_id'=>"1",
            'kraj_id'=>"1",
            'mesto'=>"Bratislava",
            'psc'=>"00001",
            'ulica' => "Hlavná 54",
            'tel' => "+421900000123",
            'web' => "firma2.sk",
            'api_token'=>sha1(time()),
            'rola_id'=>"4",
            'je_schvalena'=>false,
        ]);

        DB::table('firma')->insert([
            'email' => "Firma3@gmail.com",
            'heslo' => Hash::make('test'),
            'nazov' => "Firma3 S.R.O",
            'ico' => "ICO Firma3",
            'informacie' => "Firma3 Informacie",
            'krajina_id'=>"1",
            'kraj_id'=>"2",
            'mesto'=>"Trnava",
            'psc'=>"00002",
            'ulica' => "Pekná 52",
            'tel' => "+421900123457",
            'web' => "Firma3.sk",
            'api_token'=>sha1(time()),
            'rola_id'=>"4",
            'je_schvalena'=>true,
        ]);

        DB::table('firma')->insert([
            'email' => "Firma4@gmail.com",
            'heslo' => Hash::make('test'),
            'nazov' => "Firma4 S.R.O",
            'ico' => "ICO Firma4",
            'informacie' => "Firma4 Informacie",
            'krajina_id'=>"1",
            'kraj_id'=>"6",
            'mesto'=>"Bánska Bystrica",
            'psc'=>"00003",
            'ulica' => "1. Mája 493",
            'tel' => "+421900123458",
            'web' => "Firma4.sk",
            'api_token'=>sha1(time()),
            'rola_id'=>"4",
            'je_schvalena'=>true,
        ]);

        DB::table('firma')->insert([
            'email' => "Firma5@gmail.com",
            'heslo' => Hash::make('test'),
            'nazov' => "Firma5 S.R.O",
            'ico' => "ICO Firma5",
            'informacie' => "Firma5 Informacie",
            'krajina_id'=>"1",
            'kraj_id'=>"4",
            'mesto'=>"Nitra",
            'psc'=>"00006",
            'ulica' => "Akademická 47",
            'tel' => "+421900123243",
            'web' => "Firma 4.sk",
            'api_token'=>sha1(time()),
            'rola_id'=>"4",
            'je_schvalena'=>true,
        ]);


        DB::table('firma')->insert([
            'email' => "Firma6@gmail.com",
            'heslo' => Hash::make('test'),
            'nazov' => "Firma6 S.R.O",
            'ico' => "ICO Firma6",
            'informacie' => "Firma6 Informacie",
            'krajina_id'=>"3",
            'kraj_id'=>"10",
            'mesto'=>"Praha",
            'psc'=>"123456",
            'ulica' => "Hlavná 2",
            'tel' => "0936145236",
            'web' => "Firma 6.sk",
            'api_token'=>sha1(time()),
            'rola_id'=>"4",
            'je_schvalena'=>true,
        ]);

        DB::table('firma')->insert([
            'email' => "Firma7@gmail.com",
            'heslo' => Hash::make('test'),
            'nazov' => "Firma7 S.R.O",
            'ico' => "ICO Firma7",
            'informacie' => "Firma7 Informacie",
            'krajina_id'=>"1",
            'kraj_id'=>"2",
            'mesto'=>"Trnava",
            'psc'=>"00002",
            'ulica' => "Dlhá 64",
            'tel' => "+421900124578",
            'web' => "Firma 7.sk",
            'api_token'=>sha1(time()),
            'rola_id'=>"4",
            'je_schvalena'=>true,
        ]);

        DB::table('firma')->insert([
            'email' => "Firma8@gmail.com",
            'heslo' => Hash::make('test'),
            'nazov' => "Firma8 S.R.O",
            'ico' => "ICO Firma8",
            'informacie' => "Firma8 Informacie",
            'krajina_id'=>"1",
            'kraj_id'=>"4",
            'mesto'=>"Nitra",
            'psc'=>"94906",
            'ulica' => "Klokočina 547",
            'tel' => "+421900126666",
            'web' => "Firma8.sk",
            'api_token'=>sha1(time()),
            'rola_id'=>"4",
            'je_schvalena'=>true,
        ]);

        DB::table('firma')->insert([
            'email' => "Firma9@gmail.com",
            'heslo' => Hash::make('test'),
            'nazov' => "Firma9 S.R.O",
            'ico' => "ICO Firma9",
            'informacie' => "Firma9 Informacie",
            'krajina_id'=>"1",
            'kraj_id'=>"1",
            'mesto'=>"Bratislava",
            'psc'=>"00002",
            'ulica' => "Ružičková 69",
            'tel' => "+421900127897",
            'web' => "Firma9.sk",
            'api_token'=>sha1(time()),
            'rola_id'=>"4",
            'je_schvalena'=>true,
        ]);

        DB::table('firma')->insert([
            'email' => "Firma10@gmail.com",
            'heslo' => Hash::make('test'),
            'nazov' => "Firma10 S.R.O",
            'ico' => "ICO Firma10",
            'informacie' => "Firma10 Informacie",
            'krajina_id'=>"1",
            'kraj_id'=>"4",
            'mesto'=>"Nitra",
            'psc'=>"94900",
            'ulica' => "Chrenová 329",
            'tel' => "+421905789632",
            'web' => "Firma 10.sk",
            'api_token'=>sha1(time()),
            'rola_id'=>"4",
            'je_schvalena'=>true,
        ]);

        DB::table('firma')->insert([
            'email' => "Firma11@gmail.com",
            'heslo' => Hash::make('test'),
            'nazov' => "Firma11 S.R.O",
            'ico' => "ICO Firma11",
            'informacie' => "Firma11 Informacie",
            'krajina_id'=>"1",
            'kraj_id'=>"1",
            'mesto'=>"Bratislava",
            'psc'=>"02536",
            'ulica' => "Hlavné Nádražie 4",
            'tel' => "+421900178963",
            'web' => "Firma 11.sk",
            'api_token'=>sha1(time()),
            'rola_id'=>"4",
            'je_schvalena'=>true,
        ]);


    }
}
