<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = [
            (object)[
                'name' => 'Rhinocéros',
                'description_fr' => 'Animal fort avec une grande corne.',
                'image_path' => 'images/les animaux/rhinoceros.jpg'
            ],
            (object)[
                'name' => 'Léopard',
                'description_fr' => 'Félin agile aux taches élégantes.',
                'image_path' => 'images/les animaux/leopard.jpg'
            ],
            (object)[
                'name' => 'Hippopotame',
                'description_fr' => 'Gros animal qui aime l’eau.',
                'image_path' => 'images/les animaux/hippopotame.jpg'
            ],
            (object)[
                'name' => 'Tigre',
                'description_fr' => 'Grand félin rayé, rapide et puissant.',
                'image_path' => 'images/les animaux/tigre.jpg'
            ],
            (object)[
                'name' => 'Lion',
                'description_fr' => 'Le roi de la savane.',
                'image_path' => 'images/les animaux/lion.jpg'
            ],
            (object)[
                'name' => 'Ours',
                'description_fr' => 'Gros mammifère à la fourrure épaisse.',
                'image_path' => 'images/les animaux/ours.jpg'
            ],
            (object)[
                'name' => 'Chien',
                'description_fr' => 'Le meilleur ami de l’homme.',
                'image_path' => 'images/les animaux/chien.jpg'
            ],
            (object)[
                'name' => 'Panda',
                'description_fr' => 'Adorable et paresseux, aime le bambou.',
                'image_path' => 'images/les animaux/panda.jpg'
            ],
            (object)[
                'name' => 'Cochon',
                'description_fr' => 'Animal rose et rigolo.',
                'image_path' => 'images/les animaux/cochon.jpg'
            ]
        ];

        return view('animals.index', compact('animals'));
    }
}
