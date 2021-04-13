<?php

use Illuminate\Database\Seeder;

class ais_filesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ais_files')->insert([
            'file_URL' => "backend/storage/ais/P_123456.png",
            'file' => "P_123456.png",
            'isProfile' => true,
            'ais_id'=>"1"
        ]);

        DB::table('ais_files')->insert([
            'file_URL' => "backend/storage/ais/Z_123456.pdf",
            'file' => "Z_123456.pdf",
            'isProfile' => false,
            'ais_id'=>"1"
        ]);

    }
}
