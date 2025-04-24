<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all(); // Récupère toutes les couleurs
        return view('colors.index', compact('colors'));
    }
}
