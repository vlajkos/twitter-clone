<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Models\User;
use Illuminate\Http\Request;

class TweetController extends Controller
{

    public function show(User $user)
    {
        $tweets = Tweet::where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('profile', ['tweets' => $tweets, 'user' => $user]);
    }

    public function store()
    {

        $data = request()->validate(
            [
                'body' => ['required', 'min:2', 'max:255']
            ]
        );

        $data['user_id'] = request()->user()->id;

        Tweet::create($data);
        return redirect('/dashboard');


    }
}