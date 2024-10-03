<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            /*0 FK*/
            CategorieSeeder::class,
            MuntstukSeeder::class,
            OrganisatieSeeder::class,
            RolSeeder::class,
            /*1 FK*/
            InstellingSeeder::class,
            VerkoopSeeder::class,
            StandaardProductSeeder::class,
            /*2 FK*/
            VerkooplijnSeeder::class,
            UserIdSeeder::class,
            WisselgeldSeeder::class,
            /*3 FK*/
            ProductSeeder::class
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
