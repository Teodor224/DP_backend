<?php

use Illuminate\Database\Seeder;

class firma_filesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('firma_files')->insert([
            'file_URL' => "backend/storage/firma/P_firma.png",
            'file' => "P_firma.png",
            'isProfile' => true,
            'firma_id'=>"1"
        ]);

        DB::table('firma_files')->insert([
            'file_URL' => "backend/storage/firma/PP_firma.pptx",
            'file' => "PP_firma.pptx",
            'isProfile' => false,
            'firma_id'=>"1"
        ]);

        DB::table('firma_files')->insert([
            'file_URL' => "backend/storage/firma/P1_firma.png",
            'file' => "P1_firma.png",
            'isProfile' => true,
            'firma_id'=>"3"
        ]);

        DB::table('firma_files')->insert([
            'file_URL' => "backend/storage/firma/P2_firma.png",
            'file' => "P2_firma.png",
            'isProfile' => true,
            'firma_id'=>"5"
        ]);

        DB::table('firma_files')->insert([
            'file_URL' => "backend/storage/firma/P3_firma.png",
            'file' => "P3_firma.png",
            'isProfile' => true,
            'firma_id'=>"6"
        ]);

        DB::table('firma_files')->insert([
            'file_URL' => "backend/storage/firma/P4_firma.png",
            'file' => "P4_firma.png",
            'isProfile' => true,
            'firma_id'=>"7"
        ]);

        DB::table('firma_files')->insert([
            'file_URL' => "backend/storage/firma/P5_firma.png",
            'file' => "P5_firma.png",
            'isProfile' => true,
            'firma_id'=>"10"
        ]);


    }
}
