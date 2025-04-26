<?php

namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    public function index()
    {
        $transports = Transport::all();
        return view('transport.index', compact('transports'));
    }

    public function getCardStyle()
    {
        return [
            'background' => 'bg-indigo-100',
            'hover' => 'hover:bg-indigo-200',
            'text' => 'text-indigo-600'
        ];
    }
} 