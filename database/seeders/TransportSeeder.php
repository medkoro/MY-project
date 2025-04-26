<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transport;

class TransportSeeder extends Seeder
{
    public function run()
    {
        $transports = [
            [
                'name' => 'Car',
                'name_fr' => 'Voiture',
                'image' => 'Voiture.jpg',
                'sound' => 'Voiture.mp3'
            ],
            [
                'name' => 'Bus',
                'name_fr' => 'Bus',
                'image' => 'Bus.jpg',
                'sound' => 'Bus.mp3'
            ],
            [
                'name' => 'Train',
                'name_fr' => 'Train',
                'image' => 'Train.jpg',
                'sound' => 'Train.mp3'
            ],
            [
                'name' => 'Airplane',
                'name_fr' => 'Avion',
                'image' => 'Avion.jpg',
                'sound' => 'Avion.mp3'
            ],
            [
                'name' => 'Boat',
                'name_fr' => 'Bateau',
                'image' => 'Bateau.jpg',
                'sound' => 'Bateau.mp3'
            ],
            [
                'name' => 'Motorcycle',
                'name_fr' => 'Moto',
                'image' => 'Moto.jpg',
                'sound' => 'Moto.mp3'
            ]
        ];

        foreach ($transports as $transport) {
            Transport::create($transport);
        }
    }
} 