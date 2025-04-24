<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('type');
            $table->boolean('is_active')->default(true);
            $table->integer('play_count')->default(0);
            $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('games');
    }
}; 