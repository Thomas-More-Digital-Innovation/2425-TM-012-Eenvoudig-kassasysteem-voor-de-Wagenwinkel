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
                    'naam' => 'Jef',
                    'wachtwoord' => Hash::make('Jef'),
                    'rol_id' => 2,
                    'organisatie_id' => 2,
                    'wachtwoordWijzigen' => 0
                ],
                [
                    'naam' => 'Jan',
                    'wachtwoord' => Hash::make('Jan'),
                    'rol_id' => 2,
                    'organisatie_id' => 1,
                    'wachtwoordWijzigen' => 1
                ],
                [
                    'naam' => 'Peter',
                    'wachtwoord' => Hash::make('Peter'),
                    'rol_id' => 1,
                    'organisatie_id' => 2,
                    'wachtwoordWijzigen' => 0
                ]
            ]);
    }
}
