<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert(
        [
            [
                'naam'=>"Food",
                'pictogram' => 'food-icon'
            ],
            [
                'naam'=>"No food",
                'pictogram' => 'no-food-icon'
            ]
        ]);
    }
}
