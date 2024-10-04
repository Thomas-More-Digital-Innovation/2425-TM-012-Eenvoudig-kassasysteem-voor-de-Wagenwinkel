<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('producten')->insert(
            [
                [
                    'naam' => 'product 1',
                    'actuele_prijs' => 16.5,
                    'afbeeldingen' => 'test.png',
                    'organisatie_id' => 1,
                    'categorie_id' => 2,
                    'standaard_id' => 1
                ],
                [
                    'naam' => 'product 2',
                    'actuele_prijs' => 5.5,
                    'afbeeldingen' => 'test2.png',
                    'organisatie_id' => 3,
                    'categorie_id' => 1,
                    'standaard_id' => 1
                ]
            ]
        );
    }
}
