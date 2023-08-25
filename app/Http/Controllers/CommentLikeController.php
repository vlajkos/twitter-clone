<?php

namespace App\Http\Controllers;

use App\Http\Requests\LikeStoreRequest;
use Illuminate\Http\Request;
use App\Models\commentLike;
use App\Models\Comment;
use App\Models\Tweet;
use App\Models\User;

class CommentLikeController extends Controller
{
    public function index(User $user, Tweet $tweet, Comment $comment)
    {


        return view('tweet.likes', [
            'user' => $user,
            'users' => $comment->likes->pluck('user'),
            'reaction' => 'likes'
        ]);

    }

    public function store()
    {

        commentLike::create(request()->all());
        return back();

    }
}