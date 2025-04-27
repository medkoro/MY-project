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
        // Créer l'utilisateur admin s'il n'existe pas
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // Exécuter les seeders dans l'ordre
        $this->call([
            AnimalSeeder::class,
            ColorSeeder::class,
            NumberSeeder::class,
            TransportSeeder::class,
            AdminUserSeeder::class,
            QuizSeeder::class,
            FruitSeeder::class,
            LegumeSeeder::class,
        ]);
    }
}