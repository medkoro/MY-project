<?php
namespace App\Http\Controllers;

use App\Models\Number;
use Illuminate\Http\Request;

class NumberController extends Controller
{
    public function index()
    {
        $numbers = Number::all(); // Récupère tous les nombres
        return view('numbers.index', compact('numbers'));
    }
}