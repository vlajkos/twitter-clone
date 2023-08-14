<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index(User $user, Tweet $tweet)
    {
        return view('tweet.likes', [
            'user' => $user,
            'users' => $tweet->likes->pluck('user')
        ]);

    }
}