<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FruitController extends Controller
{
    public function index()
    {
        $fruits = [
            ['name' => 'Banane', 'image' => 'Banane.jpg', 'sound' => 'banane.mp3'],
            ['name' => 'Fraise', 'image' => 'Fraise.jpg', 'sound' => 'fraise.mp3'],
            ['name' => 'Mangue', 'image' => 'Mangue.jpg', 'sound' => 'mangue.mp3'],
            ['name' => 'Orange', 'image' => 'Orange.jpg', 'sound' => 'orange.mp3'],
            ['name' => 'Pomme', 'image' => 'Pomme.jpg', 'sound' => 'pomme.mp3'],
            ['name' => 'Raisin', 'image' => 'Raisin.jpg', 'sound' => 'raisin.mp3'],
        ];

        return view('fruits.index', compact('fruits'));
    }
}
