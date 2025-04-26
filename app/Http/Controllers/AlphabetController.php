<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlphabetController extends Controller
{
    public function index()
    {
        $colors = [
            'A' => '#FFD1DC', // Rose clair
            'B' => '#C1F0F6', // Bleu pastel
            'C' => '#FFE4B5', // Jaune pastel
            'D' => '#E6E6FA', // Lavande
            'E' => '#D0F0C0', // Menthe clair
            'F' => '#FFFACD', // Jaune citron doux
            'G' => '#FADADD', // Rose très clair
            'H' => '#B0E0E6', // Bleu clair
            'I' => '#F0FFF0', // Vert neige
            'J' => '#FFDEAD', // Pêche clair
            'K' => '#E0FFFF', // Cyan pâle
            'L' => '#FFF0F5', // Rose pâle
            'M' => '#FFE0B2', // Orange pastel 🍊
            'N' => '#D1C4E9', // Lavande pastel 💜
            'O' => '#D8F3DC', // Menthe fraîche 🌿
            'P' => '#FAD6A5', // Saumon clair 🍑
            'Q' => '#FFEBE0', // Rose ultra clair 🌸
            'R' => '#FFF5BA', // Jaune soleil doux ☀️
            'S' => '#C7CEEA', // Bleu lavande pastel 🔵
            'T' => '#F0FFF0', // Vert neige ❄️
            'U' => '#FFCCE5', // Rose pastel vif 🌺
            'V' => '#C1E1C1', // Vert tendre 🌱
            'W' => '#AED9E0', // Bleu ciel tendre 🌤️
            'X' => '#E0FFFF', // Cyan pastel 💧
            'Y' => '#D7FFFE', // Bleu très très clair 🧊
            'Z' => '#FFF9DB', // Jaune banane 🍌
        ];

        $alphabets = [
            (object)[ 'letter' => 'A', 'word' => 'Avion' ],
            (object)[ 'letter' => 'B', 'word' => 'Ballon' ],
            (object)[ 'letter' => 'C', 'word' => 'Chat' ],
            (object)[ 'letter' => 'D', 'word' => 'Dauphin' ],
            (object)[ 'letter' => 'E', 'word' => 'Éléphant' ],
            (object)[ 'letter' => 'F', 'word' => 'Fleur' ],
            (object)[ 'letter' => 'G', 'word' => 'Gâteau' ],
            (object)[ 'letter' => 'H', 'word' => 'Hippopotame' ],
            (object)[ 'letter' => 'I', 'word' => 'Igloo' ],
            (object)[ 'letter' => 'J', 'word' => 'Jardin' ],
            (object)[ 'letter' => 'K', 'word' => 'Koala' ],
            (object)[ 'letter' => 'L', 'word' => 'Lion' ],
            (object)[ 'letter' => 'M', 'word' => 'Maison' ],
            (object)[ 'letter' => 'N', 'word' => 'Nuage' ],
            (object)[ 'letter' => 'O', 'word' => 'Oiseau' ],
            (object)[ 'letter' => 'P', 'word' => 'Papillon' ],
            (object)[ 'letter' => 'Q', 'word' => 'Quille' ],
            (object)[ 'letter' => 'R', 'word' => 'Robot' ],
            (object)[ 'letter' => 'S', 'word' => 'Soleil' ],
            (object)[ 'letter' => 'T', 'word' => 'Tigre' ],
            (object)[ 'letter' => 'U', 'word' => 'Uniforme' ],
            (object)[ 'letter' => 'V', 'word' => 'Voiture' ],
            (object)[ 'letter' => 'W', 'word' => 'Wagon' ],
            (object)[ 'letter' => 'X', 'word' => 'Xylophone' ],
            (object)[ 'letter' => 'Y', 'word' => 'Yacht' ],
            (object)[ 'letter' => 'Z', 'word' => 'Zèbre' ],
        ];

        foreach ($alphabets as $item) {
            $item->color = $colors[$item->letter];
        }

        return view('alphabet.index', compact('alphabets'));
    }
}
