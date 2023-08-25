<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CommentStoreRequest $request)
    {

        $comment = new Comment([
            'body' => $request->body,
            'tweet_id' => $request->tweet_id,
            'user_id' => $request->user()->id,
        ]);
        $comment->save();
        return back();

    }

    public function show(User $user, Tweet $tweet, Comment $comment)
    {
        return view('comment.show', ['user' => $user, 'tweet' => $tweet, 'comment' => $comment]);
    }

}