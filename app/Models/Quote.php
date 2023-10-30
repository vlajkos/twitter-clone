<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quote extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(QuoteLike::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'tweet_id');
    }

    public function tweet(): HasOne
    {
        return $this->hasOne(Tweet::class);
    }

    public function likedByUser(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
    
}
