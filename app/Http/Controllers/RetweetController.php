<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class RetweetController extends Controller
{

    public function index(User $user, Tweet $tweet)
    {
        return view('tweet.likes', [
            'user' => $user,
            'users' => $tweet->retweets->pluck('author'),
            'reaction' => 'retweet'
        ]);

    }
    public function store()
    {

        $data = request()->validate(
            [
                'body' => ['required', 'min:2', 'max:255'],
                'tweet_id' => ['required', 'exists:tweets,id']
            ]
        );

        $data['user_id'] = request()->user()->id;

        Tweet::create($data);
        return back();


    }
}