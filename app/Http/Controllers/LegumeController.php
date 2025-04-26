<?php

namespace App\Http\Controllers;

use App\Models\Legume;
use Illuminate\Http\Request;

class LegumeController extends Controller
{
    public function index()
    {
        $legumes = Legume::all();
        return view('legumes.index', compact('legumes'));
    }

    public function getCardStyle()
    {
        return [
            'background' => 'bg-emerald-100',
            'hover' => 'hover:bg-emerald-200',
            'text' => 'text-emerald-600'
        ];
    }
} 