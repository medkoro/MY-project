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
        Color::create(['name' => 'Rouge', 'name_fr' => 'Rouge', 'hex_code' => '#FF0000']);
        Color::create(['name' => 'Bleu', 'name_fr' => 'Bleu', 'hex_code' => '#0000FF']);
        Color::create(['name' => 'Vert', 'name_fr' => 'Vert', 'hex_code' => '#00FF00']);
        Color::create(['name' => 'Jaune', 'name_fr' => 'Jaune', 'hex_code' => '#FFFF00']);
        Color::create(['name' => 'Orange', 'name_fr' => 'Orange', 'hex_code' => '#FFA500']);
        Color::create(['name' => 'Violet', 'name_fr' => 'Violet', 'hex_code' => '#800080']);
        Color::create(['name' => 'Rose', 'name_fr' => 'Rose', 'hex_code' => '#FFC0CB']);
        Color::create(['name' => 'Noir', 'name_fr' => 'Noir', 'hex_code' => '#000000']);
        Color::create(['name' => 'Blanc', 'name_fr' => 'Blanc', 'hex_code' => '#FFFFFF']);
        Color::create(['name' => 'Gris', 'name_fr' => 'Gris', 'hex_code' => '#808080']);
    }
}
