<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegumeController extends Controller
{
    public function index()
    {
        $legumes = [
            ['name' => 'Brocoli', 'image' => 'Brocoli.jpg', 'sound' => 'Brocoli.mp3'],
            ['name' => 'Carotte', 'image' => 'Carotte.jpg', 'sound' => 'Carotte.mp3'],
            ['name' => 'Concombre', 'image' => 'Concombre.jpg', 'sound' => 'Concombre.mp3'],
            ['name' => 'Poivron', 'image' => 'Poivron.jpg', 'sound' => 'Poivron.mp3'],
            ['name' => 'Pomme de terre', 'image' => 'Pomme de terre.jpg', 'sound' => 'Pomme de terre.mp3'],
            ['name' => 'Tomate', 'image' => 'Tomate.jpg', 'sound' => 'Tomate.mp3'],
        ];

        return view('legumes.index', compact('legumes'));
    }
}
