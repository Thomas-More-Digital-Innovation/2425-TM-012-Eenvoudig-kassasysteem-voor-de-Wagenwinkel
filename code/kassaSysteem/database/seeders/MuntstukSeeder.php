<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MuntstukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('muntstukken')->insert(
            [
                [
                    'soort' => 0.20
                ],
                [
                    'soort' => 0.10
                ],
                [
                    'soort' => 10
                ]
            ]
        );
    }
}
