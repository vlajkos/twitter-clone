<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeStoreRequest;
use App\Models\Like;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index(User $user, Tweet $tweet)
    {
        return view('tweet.likes', [
            'user' => $user,
            'users' => $tweet->likes->pluck('user'),
            'reaction' => 'likes'
        ]);

    }

    public function store(LikeStoreRequest $request)
    {




        Like::create($request->all());
        $tweet = Tweet::find($request->tweet_id);
        $author = $tweet->author->id;
        $user = $request->user_id;
        if ($author != $user)
            NotificationController::store($user, $author, 'like', $tweet->body);
        return back();



    }
}