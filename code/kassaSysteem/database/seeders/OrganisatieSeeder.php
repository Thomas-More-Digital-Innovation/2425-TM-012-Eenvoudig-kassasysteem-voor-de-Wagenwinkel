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
                    'naam' => 'ADMIN',
                    'actiesMetSpraak' => false,
                    'kleurenBlind' => false,
                    'voorraadAangeven' => false,
                    'wisselgeldAangeven' => false,
                    'trillenBijActies' => false,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'naam' => 'Buso',
                    'actiesMetSpraak' => false,
                    'kleurenBlind' => false,
                    'voorraadAangeven' => false,
                    'wisselgeldAangeven' => false,
                    'trillenBijActies' => false,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }
}
