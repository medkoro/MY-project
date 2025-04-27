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

<<<<<<< HEAD
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call(CategorySeeder::class);
        $this->call(NumberSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(AnimalSeeder::class);
=======
        // Exécuter les seeders dans l'ordre
>>>>>>> 5b49e6a373a032417f723546d5a545cedb7ebf06
        $this->call([
            AnimalSeeder::class,
            ColorSeeder::class,
            NumberSeeder::class,
            TransportSeeder::class,
            AdminUserSeeder::class,
<<<<<<< HEAD
            QuizSeeder::class,
=======
            FruitSeeder::class,
            LegumeSeeder::class,
>>>>>>> 5b49e6a373a032417f723546d5a545cedb7ebf06
        ]);
    }
}
