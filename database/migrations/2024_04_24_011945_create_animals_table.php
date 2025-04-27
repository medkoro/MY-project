<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('animals')) {
            Schema::create('animals', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('name_fr');
                $table->string('description_fr');
                $table->string('image_path');
                $table->string('audio_path')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};