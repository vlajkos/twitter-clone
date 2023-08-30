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
        $comment = Comment::find(request()->comment_id);
        $author = $comment->author->id;
        $user = request()->user_id;
        if ($author != $user)
            NotificationController::store($user, $author, 'comment_like', $comment->body);
        return back();

    }
}