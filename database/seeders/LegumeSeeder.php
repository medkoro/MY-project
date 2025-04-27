<?php

namespace Database\Seeders;

use App\Models\Legume;
use Illuminate\Database\Seeder;

class LegumeSeeder extends Seeder
{
    public function run()
    {
        $legumes = [
            [
                'name' => 'Carrot',
                'name_fr' => 'Carotte',
                'image' => 'Carotte.jpg',
                'sound' => 'Carotte.mp3'
            ],
            [
                'name' => 'Tomato',
                'name_fr' => 'Tomate',
                'image' => 'Tomate.jpg',
                'sound' => 'Tomate.mp3'
            ],
            [
                'name' => 'Potato',
                'name_fr' => 'Pomme de terre',
                'image' => 'Pomme de terre.jpg',
                'sound' => 'Pomme de terre.mp3'
            ],
            [
                'name' => 'Cucumber',
                'name_fr' => 'Concombre',
                'image' => 'Concombre.jpg',
                'sound' => 'Concombre.mp3'
            ],
            [
                'name' => 'Pepper',
                'name_fr' => 'Poivron',
                'image' => 'Poivron.jpg',
                'sound' => 'Poivron.mp3'
            ],
            [
                'name' => 'Broccoli',
                'name_fr' => 'Brocoli',
                'image' => 'Brocoli.jpg',
                'sound' => 'Brocoli.mp3'
            ]
        ];

        foreach ($legumes as $legume) {
            Legume::create($legume);
        }
    }
} 