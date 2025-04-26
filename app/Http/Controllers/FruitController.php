<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    public function index()
    {
        $fruits = Fruit::all();
        return view('fruits.index', compact('fruits'));
    }

    public function getCardStyle()
    {
        return [
            'background' => 'bg-amber-100',
            'hover' => 'hover:bg-amber-200',
            'text' => 'text-amber-600'
        ];
    }
} 