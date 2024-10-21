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
                    'naam' => 'Isabel',
                    'wachtwoord' => Hash::make('Isabel'),
                    'rol_id' => 1,
                    'organisatie_id' => 1,
                    'wachtwoordWijzigen' => 0
                ]
            ]);
    }
}
