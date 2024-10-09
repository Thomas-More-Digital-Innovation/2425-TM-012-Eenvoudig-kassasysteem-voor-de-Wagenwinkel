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
                    'waarde' => 50.00,
                    'afbeelding' => 'assets/images/money/50.png'
                ],
                [
                    'naam' => '20',
                    'waarde' => 20.00,
                    'afbeelding' => 'assets/images/money/20.png'
                ],
                [
                    'naam' => '10',
                    'waarde' => 10.00,
                    'afbeelding' => 'assets/images/money/10.png'
                ],
                [
                    'naam' => '5',
                    'waarde' => 5.00,
                    'afbeelding' => 'assets/images/money/5.png'
                ],
                [
                    'naam' => '2',
                    'waarde' => 2.00,
                    'afbeelding' => 'assets/images/money/2.png'
                ],
                [
                    'naam' => '1',
                    'waarde' => 1.00,
                    'afbeelding' => 'assets/images/money/1.png'
                ],
                [
                    'naam' => '50',
                    'waarde' => 0.50,
                    'afbeelding' => 'assets/images/money/_50.png'
                ],
                [
                    'naam' => '20',
                    'waarde' => 0.20,
                    'afbeelding' => 'assets/images/money/_20.png'
                ],
                [
                    'naam' => '10',
                    'waarde' => 0.10,
                    'afbeelding' => 'assets/images/money/_10.png'
                ],
                [
                    'naam' => '5',
                    'waarde' => 0.05,
                    'afbeelding' => 'assets/images/money/_5.png'
                ],
            ]
        );
    }
}
