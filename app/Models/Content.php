<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'type',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }

    public function getAudioUrlAttribute()
    {
        return $this->audio_path ? asset('storage/' . $this->audio_path) : null;
    }

    public function getVideoUrlAttribute()
    {
        return $this->video_path ? asset('storage/' . $this->video_path) : null;
    }
}