<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StandaardProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('standaard_producten')->insert(
            [
                [
                    'naam' => 'Koek',
                    'afbeelding' => 'assets/images/items/koekje.png',
                    'standaardprijs' => 1.5,
                    'categorie_id' => 1
                ],
                [
                    'naam' => 'Appel',
                    'afbeelding' => 'assets/images/items/appel.png',
                    'standaardprijs' => 0.5,
                    'categorie_id' => 1
                ]
            ]);
    }
}
