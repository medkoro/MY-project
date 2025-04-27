<?php

namespace Database\Seeders;

use App\Models\Fruit;
use Illuminate\Database\Seeder;

class FruitSeeder extends Seeder
{
    public function run()
    {
        $fruits = [
            [
                'name' => 'Apple',
                'name_fr' => 'Pomme',
                'image' => 'Pomme.jpg',
                'sound' => 'Pomme.mp3'
            ],
            [
                'name' => 'Banana',
                'name_fr' => 'Banane',
                'image' => 'Banane.jpg',
                'sound' => 'Banane.mp3'
            ],
            [
                'name' => 'Orange',
                'name_fr' => 'Orange',
                'image' => 'Orange.jpg',
                'sound' => 'Orange.mp3'
            ],
            [
                'name' => 'Strawberry',
                'name_fr' => 'Fraise',
                'image' => 'Fraise.jpg',
                'sound' => 'Fraise.mp3'
            ],
            [
                'name' => 'Grape',
                'name_fr' => 'Raisin',
                'image' => 'Raisin.jpg',
                'sound' => 'Raisin.mp3'
            ],
            [
                'name' => 'Mango',
                'name_fr' => 'Mangue',
                'image' => 'Mangue.jpg',
                'sound' => 'Mangue.mp3'
            ]
        ];

        foreach ($fruits as $fruit) {
            Fruit::create($fruit);
        }
    }
} 