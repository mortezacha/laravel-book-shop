<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function likes():HasMany
    {
        return $this->hasMany(Like::class);
    }
    protected function getFullImageUrlAttribute()
    {
        if ($this->image_url) {
            return asset('storage/'.$this->image_url);
        }

        return null;
    }
}
