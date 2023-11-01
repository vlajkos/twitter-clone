<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LikeStoreRequest;
use App\Models\QuoteLike;
use App\Models\Quote;
use App\Models\User;


class QuoteLikeController extends Controller
{
    // public function index(User $user, Quote $quote)
    // {
    //     return view('tweet.likes', [
    //         'user' => $user,
    //         'users' => $quote->likes->pluck('user'),
    //         'reaction' => 'likes'
    //     ]);

    // }

    public function store(Request $request)
    {


        QuoteLike::create($request->all());
        $quote = Quote::find($request->quote_id);
        $author = $quote->author->id;
        $user = $request->user_id;
        if ($author != $user)
            NotificationController::store($user, $author, 'like', $quote->body);
        return back();

    }
}
