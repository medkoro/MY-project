<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'category_id',
        'text',
        'image_path',
        'audio_path',
        'video_path',
    ];

    /**
     * Get the category that owns the content.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
