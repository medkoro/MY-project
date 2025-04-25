<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quiz extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category',
        'difficulty',
        'is_active',
    ];

    /**
     * Get the questions for this quiz.
     */
    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get the scores for this quiz.
     */
    public function scores(): HasMany
    {
        return $this->hasMany(Score::class);
    }
}
