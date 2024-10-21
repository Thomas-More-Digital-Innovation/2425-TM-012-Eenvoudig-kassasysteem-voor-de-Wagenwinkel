<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'naam' => 'Isabelle',
                    'wachtwoord' => Hash::make('Isabelle'),
                    'rol_id' => 1,
                    'organisatie_id' => 1,
                    'wachtwoordWijzigen' => 0
                ],
                [
                'naam' => 'Maxim',
                'wachtwoord' => Hash::make('Maxim'),
                'rol_id' => 2,
                'organisatie_id' => 2,
                'wachtwoordWijzigen' => 0
            ]



            ]);
    }
}
