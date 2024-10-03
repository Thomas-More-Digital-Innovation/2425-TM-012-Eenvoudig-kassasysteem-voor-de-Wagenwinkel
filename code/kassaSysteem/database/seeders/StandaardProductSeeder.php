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
                    'naam' => 'Koekje',
                    'afbeelding' => 'koekje.png',
                    'standaardprijs' => 10.5,
                    'categorie_id' => 1
                ],
                [
                    'naam' => 'Snoepje',
                    'afbeelding' => 'Snoepje.png',
                    'standaardprijs' => 5.0,
                    'categorie_id' => 1
                ]
            ]);
    }
}
