<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'url',
        'image_path',
        'is_active',
        'play_count',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
} 