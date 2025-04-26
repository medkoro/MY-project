<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    public function run()
    {
        $animals = [
            [
                'name' => 'Rhinocéros',
                'name_fr' => 'Rhinocéros',
                'description_fr' => 'Animal fort avec une grande corne.',
                'image_path' => 'images/animals/Rhinocéros.jpg',
                'audio_path' => 'audio/animals/rhinoceros.mp3'
            ],
            [
                'name' => 'Tigre',
                'name_fr' => 'Tigre',
                'description_fr' => 'Grand félin rayé, rapide et puissant.',
                'image_path' => 'images/animals/Tigre.jpg',
                'audio_path' => 'audio/animals/tigre.mp3'
            ],
            [
                'name' => 'Lion',
                'name_fr' => 'Lion',
                'description_fr' => 'Le roi de la savane.',
                'image_path' => 'images/animals/Lion.jpg',
                'audio_path' => 'audio/animals/lion.mp3'
            ],
            [
                'name' => 'Chien',
                'name_fr' => 'Chien',
                'description_fr' => 'Le meilleur ami de l\'homme.',
                'image_path' => 'images/animals/Chien.jpg',
                'audio_path' => 'audio/animals/chien.mp3'
            ],
            [
                'name' => 'Panda',
                'name_fr' => 'Panda',
                'description_fr' => 'Adorable et paresseux, aime le bambou.',
                'image_path' => 'images/animals/Panda.jpg',
                'audio_path' => 'audio/animals/panda.mp3'
            ],
            [
                'name' => 'Chat',
                'name_fr' => 'Chat',
                'description_fr' => 'Animal domestique indépendant et élégant.',
                'image_path' => 'images/animals/Chat.jpg',
                'audio_path' => 'audio/animals/chat.mp3'
            ]
        ];

        foreach ($animals as $animal) {
            Animal::create($animal);
        }
    }
}
