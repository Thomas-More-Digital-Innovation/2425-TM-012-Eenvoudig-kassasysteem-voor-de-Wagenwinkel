<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MuntstukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('muntstukken')->insert(
            [
                [
                    'naam' => '50',
                    'waarde' => 50.00
                ],
                [
                    'naam' => '20',
                    'waarde' => 20.00
                ],
                [
                    'naam' => '10',
                    'waarde' => 10.00
                ],
                [
                    'naam' => '5',
                    'waarde' => 5.00
                ],
                [
                    'naam' => '2',
                    'waarde' => 2.00
                ],
                [
                    'naam' => '1',
                    'waarde' => 1.00
                ],
                [
                    'naam' => '_50',
                    'waarde' => 0.50
                ],
                [
                    'naam' => '_20',
                    'waarde' => 0.20
                ],
                [
                    'naam' => '_10',
                    'waarde' => 0.10
                ],
                [
                    'naam' => '_5',
                    'waarde' => 0.05
                ],
            ]
        );
    }
}
