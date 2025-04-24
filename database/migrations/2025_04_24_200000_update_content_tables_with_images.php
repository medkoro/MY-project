<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Update animals table
        Schema::table('animals', function (Blueprint $table) {
            if (!Schema::hasColumn('animals', 'image_path')) {
                $table->string('image_path')->nullable();
            }
            if (!Schema::hasColumn('animals', 'description_fr')) {
                $table->string('description_fr')->nullable();
            }
        });

        // Update colors table
        Schema::table('colors', function (Blueprint $table) {
            if (!Schema::hasColumn('colors', 'hex_code')) {
                $table->string('hex_code')->nullable();
            }
            if (!Schema::hasColumn('colors', 'name_fr')) {
                $table->string('name_fr')->nullable();
            }
        });

        // Update numbers table
        Schema::table('numbers', function (Blueprint $table) {
            if (!Schema::hasColumn('numbers', 'number_word')) {
                $table->string('number_word')->nullable();
            }
            if (!Schema::hasColumn('numbers', 'number_word_fr')) {
                $table->string('number_word_fr')->nullable();
            }
            if (!Schema::hasColumn('numbers', 'visual_representation')) {
                $table->string('visual_representation')->nullable();
            }
        });

        // Insert basic color data
        DB::table('colors')->insert([
            ['name' => 'Red', 'name_fr' => 'Rouge', 'hex_code' => '#FF0000'],
            ['name' => 'Blue', 'name_fr' => 'Bleu', 'hex_code' => '#0000FF'],
            ['name' => 'Green', 'name_fr' => 'Vert', 'hex_code' => '#00FF00'],
            ['name' => 'Yellow', 'name_fr' => 'Jaune', 'hex_code' => '#FFFF00'],
            ['name' => 'Purple', 'name_fr' => 'Violet', 'hex_code' => '#800080'],
            ['name' => 'Orange', 'name_fr' => 'Orange', 'hex_code' => '#FFA500'],
            ['name' => 'Pink', 'name_fr' => 'Rose', 'hex_code' => '#FFC0CB'],
            ['name' => 'Brown', 'name_fr' => 'Marron', 'hex_code' => '#A52A2A'],
            ['name' => 'Black', 'name_fr' => 'Noir', 'hex_code' => '#000000'],
            ['name' => 'White', 'name_fr' => 'Blanc', 'hex_code' => '#FFFFFF'],
        ]);

        // Insert numbers data
        for ($i = 1; $i <= 20; $i++) {
            $french_numbers = [
                1 => 'Un', 2 => 'Deux', 3 => 'Trois', 4 => 'Quatre', 5 => 'Cinq',
                6 => 'Six', 7 => 'Sept', 8 => 'Huit', 9 => 'Neuf', 10 => 'Dix',
                11 => 'Onze', 12 => 'Douze', 13 => 'Treize', 14 => 'Quatorze', 15 => 'Quinze',
                16 => 'Seize', 17 => 'Dix-sept', 18 => 'Dix-huit', 19 => 'Dix-neuf', 20 => 'Vingt'
            ];
            
            DB::table('numbers')->insert([
                'value' => $i,
                'number_word' => $this->numberToWords($i),
                'number_word_fr' => $french_numbers[$i],
                'visual_representation' => str_repeat('●', $i)
            ]);
        }

        // Insert basic animal data
        DB::table('animals')->insert([
            ['name' => 'Lion', 'description_fr' => 'Le lion', 'image_path' => 'images/les animaux/les images/lion.jpg'],
            ['name' => 'Elephant', 'description_fr' => 'L\'éléphant', 'image_path' => 'images/les animaux/les images/elephant.jpg'],
            ['name' => 'Giraffe', 'description_fr' => 'La girafe', 'image_path' => 'images/les animaux/les images/giraffe.jpg'],
            ['name' => 'Monkey', 'description_fr' => 'Le singe', 'image_path' => 'images/les animaux/les images/monkey.jpg'],
            ['name' => 'Zebra', 'description_fr' => 'Le zèbre', 'image_path' => 'images/les animaux/les images/zebra.jpg'],
            ['name' => 'Tiger', 'description_fr' => 'Le tigre', 'image_path' => 'images/les animaux/les images/tiger.jpg'],
            ['name' => 'Bear', 'description_fr' => 'L\'ours', 'image_path' => 'images/les animaux/les images/bear.jpg'],
            ['name' => 'Penguin', 'description_fr' => 'Le pingouin', 'image_path' => 'images/les animaux/les images/penguin.jpg'],
            ['name' => 'Kangaroo', 'description_fr' => 'Le kangourou', 'image_path' => 'images/les animaux/les images/kangaroo.jpg'],
            ['name' => 'Dolphin', 'description_fr' => 'Le dauphin', 'image_path' => 'images/les animaux/les images/dolphin.jpg'],
        ]);
    }

    public function down()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->dropColumn(['image_path', 'description_fr']);
        });

        Schema::table('colors', function (Blueprint $table) {
            $table->dropColumn(['hex_code', 'name_fr']);
        });

        Schema::table('numbers', function (Blueprint $table) {
            $table->dropColumn(['number_word', 'number_word_fr', 'visual_representation']);
        });
    }

    private function numberToWords($number) {
        $ones = [
            1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four', 5 => 'five',
            6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine', 10 => 'ten',
            11 => 'eleven', 12 => 'twelve', 13 => 'thirteen', 14 => 'fourteen',
            15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
            19 => 'nineteen', 20 => 'twenty'
        ];
        
        return $ones[$number] ?? (string)$number;
    }
}; 