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
        DB::table('user_ids')->insert(
            [
                [
                    'naam' => 'Jef',
                    'password' => 'Jef',
                    'rol_id' => 2,
                    'organisatie_id' => 2

                ],
                [
                    'naam' => 'Jan',
                    'password' => Hash::make('Jan'),
                    'rol_id' => 2,
                    'organisatie_id' => 1

                ],
                [
                    'naam' => 'Peter',
                    'password' => Hash::make('Peter'),
                    'rol_id' => 1,
                    'organisatie_id' => 2
                ]
            ]);
    }
}
