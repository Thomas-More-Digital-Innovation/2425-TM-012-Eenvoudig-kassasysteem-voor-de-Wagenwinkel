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
                    'hoeveelheid' => 99,
                    'organisatie_id' => 1,
                    'muntstuk_id' => 1
                ],
                [
                    'datum' => date("Y-m-d"),
                    'hoeveelheid' => 99,
                    'organisatie_id' => 1,
                    'muntstuk_id' => 2
                ],
                [
                    'datum' => date("Y-m-d"),
                    'hoeveelheid' => 99,
                    'organisatie_id' => 1,
                    'muntstuk_id' => 3
                ],
                [
                    'datum' => date("Y-m-d"),
                    'hoeveelheid' => 99,
                    'organisatie_id' => 1,
                    'muntstuk_id' => 4
                ],
                [
                    'datum' => date("Y-m-d"),
                    'hoeveelheid' => 99,
                    'organisatie_id' => 1,
                    'muntstuk_id' => 5
                ],
                [
                    'datum' => date("Y-m-d"),
                    'hoeveelheid' => 99,
                    'organisatie_id' => 1,
                    'muntstuk_id' => 6
                ],
                [
                    'datum' => date("Y-m-d"),
                    'hoeveelheid' => 99,
                    'organisatie_id' => 1,
                    'muntstuk_id' => 7
                ],
                [
                    'datum' => date("Y-m-d"),
                    'hoeveelheid' => 99,
                    'organisatie_id' => 1,
                    'muntstuk_id' => 8
                ],
                [
                    'datum' => date("Y-m-d"),
                    'hoeveelheid' => 99,
                    'organisatie_id' => 1,
                    'muntstuk_id' => 9
                ],
                [
                    'datum' => date("Y-m-d"),
                    'hoeveelheid' => 99,
                    'organisatie_id' => 1,
                    'muntstuk_id' => 10
                ]
            ]);
    }
}
