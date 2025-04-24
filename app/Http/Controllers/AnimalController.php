<?php

namespace App\Http\Controllers;

use App\Models\Animal;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all(); // Récupère tous les animaux
        return view('animals.index', compact('animals'));
    }
}
