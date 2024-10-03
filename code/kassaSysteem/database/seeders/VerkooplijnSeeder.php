<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VerkooplijnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('verkooplijnen')->insert(
            [
                [
                    'hoeveelheid' => 5,
                    'verkoopprijs' => 5.5,
                    'verkoop_id' => 1,
                    'product_id' => 1
                ],
                [
                    'hoeveelheid' => 8,
                    'verkoopprijs' => 6.5,
                    'verkoop_id' => 1,
                    'product_id' => 2
                ]
            ]);
    }
}
