<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserIdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_ids')->insert(
            [
                [
                    'naam' => 'Gebruiker1',
                    'password' => Hash::make('test'),
                    'rol_id' => 2,
                    'organisatie_id' => 2
                ],
                [
                    'naam' => 'Gebruiker2',
                    'password' => Hash::make('test2'),
                    'rol_id' => 3,
                    'organisatie_id' => 1
                ],
                [
                    'naam' => 'Gebruiker3',
                    'password' => Hash::make('test4'),
                    'rol_id' => 1,
                    'organisatie_id' => 2
                ]
            ]);
    }
}
