<?php

use Illuminate\Database\Seeder;

class Student_ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student_program')->insert([
            'ais_id' => "1",
            'stupen' => "2. Stupen - Mgr.",
            'rocnik' =>2,
            'studentske_programy_id' => "1",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "1",
            'stupen' => "1. Stupen - Bc.",
            'rocnik' =>3,
            'studentske_programy_id' => "2",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "2",
            'stupen' => "2. Stupen - Mgr.",
            'rocnik' =>1,
            'studentske_programy_id' => "1",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "3",
            'stupen' => "2. Stupen - Mgr.",
            'rocnik' =>2,
            'studentske_programy_id' => "1",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "4",
            'stupen' => "1. Stupen - Bc.",
            'rocnik' =>3,
            'studentske_programy_id' => "1",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "5",
            'stupen' => "2. Stupen - Mgr.",
            'rocnik' =>1,
            'studentske_programy_id' => "2",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "6",
            'stupen' => "1. Stupen - Bc.",
            'rocnik' =>2,
            'studentske_programy_id' => "1",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "7",
            'stupen' => "1. Stupen - Bc.",
            'rocnik' =>1,
            'studentske_programy_id' => "76",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "7",
            'stupen' => "1. Stupen - Bc.",
            'rocnik' =>1,
            'studentske_programy_id' => "77",
        ]);



        DB::table('student_program')->insert([
            'ais_id' => "8",
            'stupen' => "2. Stupen - Mgr.",
            'rocnik' =>2,
            'studentske_programy_id' => "50",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "9",
            'stupen' => "2. Stupen - Mgr.",
            'rocnik' =>1,
            'studentske_programy_id' => "4",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "10",
            'stupen' => "2. Stupen - Mgr.",
            'rocnik' =>1,
            'studentske_programy_id' => "16",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "11",
            'stupen' => "1. Stupen - Bc.",
            'rocnik' =>3,
            'studentske_programy_id' => "29",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "12",
            'stupen' => "1. Stupen - Bc.",
            'rocnik' =>3,
            'studentske_programy_id' => "51",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "13",
            'stupen' => "1. Stupen - Bc.",
            'rocnik' =>2,
            'studentske_programy_id' => "14",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "14",
            'stupen' => "1. Stupen - Bc.",
            'rocnik' =>2,
            'studentske_programy_id' => "14",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "15",
            'stupen' => "1. Stupen - Bc.",
            'rocnik' =>3,
            'studentske_programy_id' => "63",
        ]);

        DB::table('student_program')->insert([
            'ais_id' => "16",
            'stupen' => "1. Stupen - Bc.",
            'rocnik' =>3,
            'studentske_programy_id' => "11",
        ]);



    }
}
