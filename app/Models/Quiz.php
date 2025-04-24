<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'points',
        'questions'
    ];

    protected $casts = [
        'questions' => 'array'
    ];

    public function scores()
    {
        return $this->hasMany(QuizScore::class);
    }
}
