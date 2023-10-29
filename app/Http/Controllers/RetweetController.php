<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RepostRequest;

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
    public function store(RepostRequest $request)
    {

        $data = $request->all();
        $data['user_id'] = request()->user()->id;
        Tweet::create($data);
        $sender_id = $data['user_id'];
        $tweet = Tweet::findOrFail($data['tweet_id']);
        $user_id = $tweet->author->id;
        if ($user_id != $sender_id)
            NotificationController::store($sender_id, $user_id, 'retweet', $tweet->body);
        return back();


    }
}