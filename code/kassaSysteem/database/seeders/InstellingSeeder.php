<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstellingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('instellingen')->insert(
            [
                [
                    'instelling' => 'test Instelling 1',
                    'status' => true,
                    'organisatie_id' => 1
                ],
                [
                    'instelling' => 'test Instelling 2 (default status)',
                    'status' => false,
                    "organisatie_id" => 2
                ]
            ]);
    }
}
