<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisatieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organisaties')->insert(
            [
                [
                    'naam' => 'organisatie 1'
                ],
                [
                    'naam' => 'organisatie 2'
                ],
                [
                    'naam' => 'organisatie 3'
                ]
            ]
        );
    }
}
