<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WisselgeldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wisselgelden')->insert(
            [
                [
                    'datum' => date("Y-m-d"),
                    'hoeveelheid' => 20,
                    'organisatie_id' => 1,
                    'muntstuk_id' => 1
                ],
                [
                    'datum' => date("Y-m-d"),
                    'hoeveelheid' => 35,
                    'organisatie_id' => 2,
                    'muntstuk_id' => 2
                ],
                [
                    'datum' => date("Y-m-d"),
                    'hoeveelheid' => 10,
                    'organisatie_id' => 2,
                    'muntstuk_id' => 3
                ]
            ]);
    }
}
