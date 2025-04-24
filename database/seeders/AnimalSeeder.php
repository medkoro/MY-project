<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    public function run()
    {
        Animal::create(['name' => 'Lion', 'image_path' => 'images/animals/lion.jpg', 'audio_path' => 'audio/animals/lion.mp3']);
        Animal::create(['name' => 'Éléphant', 'image_path' => 'images/animals/elephant.jpg', 'audio_path' => 'audio/animals/elephant.mp3']);
        Animal::create(['name' => 'Chien', 'image_path' => 'images/animals/dog.jpg', 'audio_path' => 'audio/animals/dog.mp3']);
        Animal::create(['name' => 'Chat', 'image_path' => 'images/animals/cat.jpg', 'audio_path' => 'audio/animals/cat.mp3']);
    }
}
