<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Color;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Color::create(['name' => 'Rouge', 'hex_code' => '#FF0000']);
        Color::create(['name' => 'Bleu', 'hex_code' => '#0000FF']);
        Color::create(['name' => 'Vert', 'hex_code' => '#00FF00']);
        Color::create(['name' => 'Jaune', 'hex_code' => '#FFFF00']);
        Color::create(['name' => 'Orange', 'hex_code' => '#FFA500']);
        Color::create(['name' => 'Violet', 'hex_code' => '#800080']);
        Color::create(['name' => 'Rose', 'hex_code' => '#FFC0CB']);
        Color::create(['name' => 'Noir', 'hex_code' => '#000000']);
        Color::create(['name' => 'Blanc', 'hex_code' => '#FFFFFF']);
        Color::create(['name' => 'Gris', 'hex_code' => '#808080']);
    }
}
