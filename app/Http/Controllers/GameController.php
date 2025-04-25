<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::where('is_active', true)->orderBy('created_at', 'desc')->get();
        return view('games.index', compact('games'));
    }
} 