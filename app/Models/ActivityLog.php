<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class ActivityLog extends Model
{
    protected $fillable = ['user_id', 'description'];

    /**
     * The user that owns this activity.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
