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
                    'naam' => 'Buso Oosterlo',
                    'actiesMetSpraak' => true,
                    'kleurenBlind' => true,
                    'voorraadAangeven' => true,
                    'wisselgeldAangeven' => true,
                    'trillenBijActies' => true

                ],
                [
                    'naam' => 'MPI',
                    'actiesMetSpraak' => false,
                    'kleurenBlind' => false,
                    'voorraadAangeven' => false,
                    'wisselgeldAangeven' => false,
                    'trillenBijActies' => false
                ]
            ]
        );
    }
}
