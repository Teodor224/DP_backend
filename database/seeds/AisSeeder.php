<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ais')->insert([
            'meno' => "Adam",
            'priezvisko' => "Testový",
            'skolsky_email' => "test@student.ukf.sk",
            'sukromny_email' => "test@gmail.com",
            'login_ID'=>"123456",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "1990-01-01",
            'tel_cislo' => "+421000000000",
            'rola_id'=>"1",
            'krajina_id'=>"1",
            'kraj_id'=>"4",
            'mesto'=>"Bratislava",
            'ulica'=>"Pekná 4",
            'vzdelanie'=>"Vysokoškolské vzdelanie, 1. stupeň (BC.)",
            'informacie'=>"Vlastnosti:
Považujem sa za človeka, ktorý je flexibilný a vie pracovať pod stresom. Patrím medzi kreatívne a pozitívne naladené osoby, mám príjemné vystupovanie a rada pracujem s ľuďmi. Mám rada výzvy, nebojím sa ísť do nových vecí.

Záujmy:
Rada cestujem, spoznávam nové kultúry, ľudí, jedlo. Venujem sa literatúre, čítam knihy najmä z oblasti marketingu a IT. Zo športu obľubujem plávanie, 8 rokov som sa tiež venovala basketbalu. Sledujem verejné dianie, rovnako mám rada kultúru, dokumentárne filmy, divadlo a scénický tanec.",
            'api_token'=>"TEST_Token",
        ]);

        DB::table('ais')->insert([
            'meno' => "Jano",
            'priezvisko' => "Testový",
            'skolsky_email' => "test2@student.ukf.sk",
            'login_ID'=>"012345",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "1990-01-01",
            'tel_cislo' => "",
            'rola_id'=>"1",
            'krajina_id'=>"1",
            'kraj_id'=>"4",
            'mesto'=>"Nitra",
            'ulica'=>"Zelená 7",
            'vzdelanie'=>"Stredoškolské s maturitou",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);

        DB::table('ais')->insert([
            'meno' => "Admin",
            'priezvisko' => "Testový",
            'skolsky_email' => "admin@admin.ukf.sk",
            'login_ID'=>"001234",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "1980-12-05",
            'tel_cislo' => "",
            'rola_id'=>"3",
            'krajina_id'=>"1",
            'kraj_id'=>"4",
            'mesto'=>"Nitra",
            'ulica'=>"Hlavná 6",
            'vzdelanie'=>"Vysokoškolské 2. Stupen (Mgr)",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);

        DB::table('ais')->insert([
            'meno' => "Petra",
            'priezvisko' => "Testová",
            'skolsky_email' => "PetraT@student.ukf.sk",
            'login_ID'=>"987654",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "2000-05-06",
            'tel_cislo' => "",
            'rola_id'=>"1",
            'krajina_id'=>"1",
            'kraj_id'=>"3",
            'mesto'=>"Trenčín",
            'ulica'=>"Modrá 4",
            'vzdelanie'=>"Stredoškolské s maturitou",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);

        DB::table('ais')->insert([
            'meno' => "Erik",
            'priezvisko' => "Pestrý",
            'skolsky_email' => "ErikP@student.ukf.sk",
            'login_ID'=>"876543",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "2000-04-09",
            'tel_cislo' => "",
            'rola_id'=>"1",
            'krajina_id'=>"1",
            'kraj_id'=>"8",
            'mesto'=>"Košice",
            'ulica'=>"Ružová 25",
            'vzdelanie'=>"Stredoškolské s maturitou",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);

        DB::table('ais')->insert([
            'meno' => "Dana",
            'priezvisko' => "Fialková",
            'skolsky_email' => "DanaF@student.ukf.sk",
            'login_ID'=>"765432",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "2001-09-25",
            'tel_cislo' => "",
            'rola_id'=>"1",
            'krajina_id'=>"1",
            'kraj_id'=>"8",
            'mesto'=>"Košice",
            'ulica'=>"Hnedá 64",
            'vzdelanie'=>"Stredoškolské s maturitou",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);

        DB::table('ais')->insert([
            'meno' => "Jano",
            'priezvisko' => "Pestrý",
            'skolsky_email' => "JanoP@student.ukf.sk",
            'login_ID'=>"654321",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "2000-02-05",
            'tel_cislo' => "",
            'rola_id'=>"1",
            'krajina_id'=>"1",
            'kraj_id'=>"6",
            'mesto'=>"Bánska Bystrica",
            'ulica'=>"Zelená 254",
            'vzdelanie'=>"Stredoškolské s maturitou",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);


        DB::table('ais')->insert([
            'meno' => "Katarina",
            'priezvisko' => "Červená",
            'skolsky_email' => "KatarinaC@student.ukf.sk",
            'login_ID'=>"000123",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "1995-12-05",
            'tel_cislo' => "",
            'rola_id'=>"2",
            'krajina_id'=>"1",
            'kraj_id'=>"4",
            'mesto'=>"Nitra",
            'ulica'=>"Čermán 5",
            'vzdelanie'=>"Vysokoškolské 2. Stupen (Mgr)",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);

        DB::table('ais')->insert([
            'meno' => "Peter",
            'priezvisko' => "Stromový",
            'skolsky_email' => "PeterS@student.ukf.sk",
            'login_ID'=>"000012",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "1996-11-30",
            'tel_cislo' => "",
            'rola_id'=>"2",
            'krajina_id'=>"1",
            'kraj_id'=>"4",
            'mesto'=>"Nitra",
            'ulica'=>"Klokočina 505",
            'vzdelanie'=>"Vysokoškolské 2. Stupen (Mgr)",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);

        DB::table('ais')->insert([
            'meno' => "Tomáš",
            'priezvisko' => "Všelijaký",
            'skolsky_email' => "Tj@student.ukf.sk",
            'login_ID'=>"qwertz",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "2000-03-04",
            'tel_cislo' => "",
            'rola_id'=>"1",
            'krajina_id'=>"1",
            'kraj_id'=>"2",
            'mesto'=>"Trnava",
            'ulica'=>"Za rohom 28",
            'vzdelanie'=>"Vysokoškolské 1. Stupen (Bc)",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);

        DB::table('ais')->insert([
            'meno' => "Kristína",
            'priezvisko' => "Všelijaká",
            'skolsky_email' => "KristinaV@student.ukf.sk",
            'login_ID'=>"asdfgh",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "1999-05-26",
            'tel_cislo' => "",
            'rola_id'=>"1",
            'krajina_id'=>"1",
            'kraj_id'=>"5",
            'mesto'=>"Žilina",
            'ulica'=>"1. Mája 8",
            'vzdelanie'=>"Vysokoškolské 1. Stupen (Bc)",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);

        DB::table('ais')->insert([
            'meno' => "Marián",
            'priezvisko' => "Modrý",
            'skolsky_email' => "MarianM@student.ukf.sk",
            'login_ID'=>"yxcvbn",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "2000-08-08",
            'tel_cislo' => "",
            'rola_id'=>"1",
            'krajina_id'=>"1",
            'kraj_id'=>"3",
            'mesto'=>"Trenčín",
            'ulica'=>"Zrkadlová 6",
            'vzdelanie'=>"Vysokoškolské 1. Stupen (Bc)",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);

        DB::table('ais')->insert([
            'meno' => "Peter",
            'priezvisko' => "Nový",
            'skolsky_email' => "PeterN@student.ukf.sk",
            'login_ID'=>"poiuzt",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "2002-04-15",
            'tel_cislo' => "",
            'rola_id'=>"1",
            'krajina_id'=>"1",
            'kraj_id'=>"7",
            'mesto'=>"Prešov",
            'ulica'=>"Stavbárska 22",
            'vzdelanie'=>"Stredoškolské s maturitou",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);

        DB::table('ais')->insert([
            'meno' => "Nina",
            'priezvisko' => "Malá",
            'skolsky_email' => "NinaM@student.ukf.sk",
            'login_ID'=>"lkjhgf",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "2002-02-04",
            'tel_cislo' => "",
            'rola_id'=>"1",
            'krajina_id'=>"1",
            'kraj_id'=>"4",
            'mesto'=>"Nitra",
            'ulica'=>"Pri rieke 951",
            'vzdelanie'=>"Stredoškolské s maturitou",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);

        DB::table('ais')->insert([
            'meno' => "Eva",
            'priezvisko' => "Sýkorová",
            'skolsky_email' => "EvaS@student.ukf.sk",
            'login_ID'=>"mnbvcx",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "2003-09-22",
            'tel_cislo' => "",
            'rola_id'=>"1",
            'krajina_id'=>"1",
            'kraj_id'=>"6",
            'mesto'=>"Bánska Bystrica",
            'ulica'=>"Vinohrady 5",
            'vzdelanie'=>"Stredoškolské s maturitou",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);

        DB::table('ais')->insert([
            'meno' => "Eugen",
            'priezvisko' => "Drevenný",
            'skolsky_email' => "EugenD@student.ukf.sk",
            'login_ID'=>"pqwert",
            'heslo' => Hash::make('test'),
            'datum_narodenia' => "2002-04-11",
            'tel_cislo' => "",
            'rola_id'=>"1",
            'krajina_id'=>"1",
            'kraj_id'=>"8",
            'mesto'=>"Košice",
            'ulica'=>"Košická 20",
            'vzdelanie'=>"Stredoškolské s maturitou",
            'informacie'=>"",
            'api_token'=>"TEST_Token",
        ]);


    }
}
