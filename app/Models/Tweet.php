<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tweet extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }

    public function originalTweet(): BelongsTo
    {
        return $this->belongsTo(Tweet::class, 'tweet_id')->withDefault(); // Assuming 'Tweet' is the model name
    }

    public function retweets()
    {
        return $this->hasMany(Tweet::class, 'tweet_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likedByUser(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

}