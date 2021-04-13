<?php

use Illuminate\Database\Seeder;

class Stud_ProgramySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('studentske_programy')->insert([
            'nazov' => "Aplikovaná informatika",
            'fakulty_id' => "1",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Aplikovaná ekológia a environmentalistika",
            'fakulty_id' => "1",
        ]);
        DB::table('studentske_programy')->insert([
            'nazov' => "Biológia",
            'fakulty_id' => "1",
        ]);
        DB::table('studentske_programy')->insert([
            'nazov' => "Fyzika",
            'fakulty_id' => "1",
        ]);
        DB::table('studentske_programy')->insert([
            'nazov' => "Geografia v regionálnom rozvoji",
            'fakulty_id' => "1",
        ]);
        DB::table('studentske_programy')->insert([
            'nazov' => "Matematicko-štatistické a informačné metódy v ekonómii a finančníctve",
            'fakulty_id' => "1",
        ]);
        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo biológie v kombinácii",
            'fakulty_id' => "1",
        ]);
        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo chémie v kombinácii",
            'fakulty_id' => "1",
        ]);
        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo ekológie v kombinácii",
            'fakulty_id' => "1",
        ]);
        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo fyziky v kombinácii",
            'fakulty_id' => "1",
        ]);
        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo geografie v kombinácii",
            'fakulty_id' => "1",
        ]);
        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo informatiky v kombinácii",
            'fakulty_id' => "1",
        ]);
        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo matematiky v kombinácii",
            'fakulty_id' => "1",
        ]);
        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo odborných ekonomických predmetov v kombinácii",
            'fakulty_id' => "1",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Ošetrovateľstvo",
            'fakulty_id' => "2",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Psychológia",
            'fakulty_id' => "2",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Sociálna práca",
            'fakulty_id' => "2",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Sociálne služby a poradenstvo",
            'fakulty_id' => "2",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Maďarsko - slovenský bilingválny mediátor ",
            'fakulty_id' => "3",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Predškolská a elementárna pedagogika s vyučovacím jazykom maďarským",
            'fakulty_id' => "3",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Regionálny cestovný ruch",
            'fakulty_id' => "3",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Stredoeurópske areálové štúdiá",
            'fakulty_id' => "3",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Prekladateľstvo a tlmočníctvo - maďarský jazyk a kultúra v kombinácii ",
            'fakulty_id' => "3",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo maďarského jazyka a literatúry v kombinácii",
            'fakulty_id' => "3",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Anglistika",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Aplikovaná etika – etika riadenia ľudí a práce",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Archeológia",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Editorstvo a vydavateľská prax",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Estetika",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Etnológia",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Filozofia",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "História",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Kulturológia",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Marketingová komunikácia a reklama",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Pamiatková starostlivosť a kultúrne dedičstvo",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Riadenie kultúry a turizmu",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Ruský jazyk v interkultúrnej a obchodnej komunikácii",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Sociológia",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Žurnalistika",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Medziodborové študijné programy - história – archeológia",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Medziodborové študijné programy - história – filozofia",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Medziodborové študijné programy - ruský jazyk v interkultúrnej a obchodnej komunikácii – filozofia",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Medziodborové študijné programy - sociológia – anglistika",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Medziodborové študijné programy - žurnalistika – história",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Prekladateľstvo a tlmočníctvo - anglický jazyk a kultúra",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Prekladateľstvo a tlmočníctvo - nemecký jazyk a kultúra",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Prekladateľstvo a tlmočníctvo - ruský jazyk a kultúra",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Prekladateľstvo a tlmočníctvo - slovenský jazyk a kultúra",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Prekladateľstvo a tlmočníctvo - španielsky jazyk a kultúra",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo predmetov - anglický jazyk a literatúra",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo predmetov - nemecký jazyk a literatúra",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo predmetov - ruský jazyk a literatúra",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo predmetov - španielsky jazyk a literatúra",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo predmetov - taliansky jazyk a literatúra",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo predmetov - estetická výchova",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo predmetov - etická výchova",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo predmetov - história",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo predmetov - náboženská výchova",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo predmetov - slovenský jazyk a literatúra",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo predmetov - výchova k občianstvu",
            'fakulty_id' => "4",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Andragogika",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Hudba a zvukový dizajn",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Pedagogika a vychovávateľstvo",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Predškolská a elementárna pedagogika",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Špeciálna pedagogika a pedagogika osôb s poruchami učenia",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Šport a rekreácia",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo anglického jazyka a literatúry",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo hudobného umenia",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo hudobno-dramatického umenia",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo praktickej prípravy",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Výtvarná edukácia",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo anglického jazyka a literatúry (v kombinácii)",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo hudobného umenia (v kombinácii)",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo pedagogiky (v kombinácii)",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo psychológie (v kombinácii)",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo techniky (v kombinácii)",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo telesnej výchovy (v kombinácii)",
            'fakulty_id' => "5",
        ]);

        DB::table('studentske_programy')->insert([
            'nazov' => "Učiteľstvo výtvarného umenia (v kombinácii)",
            'fakulty_id' => "5",
        ]);
    }
}
