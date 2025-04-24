<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Number;

class NumberSeeder extends Seeder
{
    public function run()
    {
        Number::create(['value' => 1, 'audio_path' => 'audio/numbers/1.mp3']);
        Number::create(['value' => 2, 'audio_path' => 'audio/numbers/2.mp3']);
        Number::create(['value' => 3, 'audio_path' => 'audio/numbers/3.mp3']);
        Number::create(['value' => 4, 'audio_path' => 'audio/numbers/4.mp3']);
        Number::create(['value' => 5, 'audio_path' => 'audio/numbers/5.mp3']);
        Number::create(['value' => 6, 'audio_path' => 'audio/numbers/6.mp3']);
        Number::create(['value' => 7, 'audio_path' => 'audio/numbers/7.mp3']);
        Number::create(['value' => 8, 'audio_path' => 'audio/numbers/8.mp3']);
        Number::create(['value' => 9, 'audio_path' => 'audio/numbers/9.mp3']);
        Number::create(['value' => 10, 'audio_path' => 'audio/numbers/10.mp3']);
    }
}