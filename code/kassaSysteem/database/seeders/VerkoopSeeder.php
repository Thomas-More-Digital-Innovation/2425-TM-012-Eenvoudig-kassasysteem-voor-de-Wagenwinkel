<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VerkoopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('verkopen')->insert(
            [
                [
                    'datum_tijd' => Carbon::now()->subDay(),
                    'organisatie_id' => 1
                ]
            ]);
    }
}
