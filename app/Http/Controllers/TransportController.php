<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $transports = [
            ['name' => 'Voiture', 'name_fr' => 'Voiture', 'image' => 'Voiture.jpg', 'sound' => 'Voiture.mp3'],
            ['name' => 'Bus', 'name_fr' => 'Bus', 'image' => 'Bus.jpg', 'sound' => 'Bus.mp3'],
            ['name' => 'Train', 'name_fr' => 'Train', 'image' => 'Train.jpg', 'sound' => 'Train.mp3'],
            ['name' => 'Avion', 'name_fr' => 'Avion', 'image' => 'Avion.jpg', 'sound' => 'Avion.mp3'],
            ['name' => 'Bateau', 'name_fr' => 'Bateau', 'image' => 'Bateau.jpg', 'sound' => 'Bateau.mp3'],
            ['name' => 'Moto', 'name_fr' => 'Moto', 'image' => 'Moto.jpg', 'sound' => 'Moto.mp3'],
        ];

        return view('transport.index', compact('transports'));
    }
}
