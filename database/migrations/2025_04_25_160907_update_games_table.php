<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('games', function (Blueprint $table) {
            // Rename name to title if it exists
            if (Schema::hasColumn('games', 'name')) {
                $table->renameColumn('name', 'title');
            } else if (!Schema::hasColumn('games', 'title')) {
                $table->string('title')->after('id');
            }

            // Add url if it doesn't exist
            if (!Schema::hasColumn('games', 'url')) {
                $table->string('url')->nullable()->after('description');
            }

            // Add image_path if it doesn't exist
            if (!Schema::hasColumn('games', 'image_path')) {
                $table->string('image_path')->nullable()->after('url');
            }

            // Rename type to category if it exists
            if (Schema::hasColumn('games', 'type')) {
                $table->renameColumn('type', 'category');
            } else if (!Schema::hasColumn('games', 'category')) {
                $table->string('category')->nullable()->after('title');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            if (Schema::hasColumn('games', 'title')) {
                $table->renameColumn('title', 'name');
            }
            
            if (Schema::hasColumn('games', 'category')) {
                $table->renameColumn('category', 'type');
            }
            
            if (Schema::hasColumn('games', 'url')) {
                $table->dropColumn('url');
            }
            
            if (Schema::hasColumn('games', 'image_path')) {
                $table->dropColumn('image_path');
            }
        });
    }
};
