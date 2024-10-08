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
                    'naam' => 'appel',
                    'actuele_prijs' => 16.5,
                    'afbeeldingen' => 'assets/images/items/appel.png',
                    'organisatie_id' => 1,
                    'categorie_id' => 2,
                    'standaard_id' => 1
                ],
                [
                    'naam' => 'kaartje',
                    'actuele_prijs' => 5.5,
                    'afbeeldingen' => 'assets/images/items/kaartje.png',
                    'organisatie_id' => 3,
                    'categorie_id' => 1,
                    'standaard_id' => 1
                ],
                [
                    'naam' => 'Koek',
                    'actuele_prijs' => 5.5,
                    'afbeeldingen' => 'assets/images/items/koekje.png',
                    'organisatie_id' => 3,
                    'categorie_id' => 1,
                    'standaard_id' => 1
                ]
            ]
        );
    }
}
