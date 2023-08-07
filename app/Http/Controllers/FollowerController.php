<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FollowerController extends Controller
{
    public function store()
    {

        $follower_id = request()->user()->id;
        $data = request()->validate(
            [
                'following_id' => ['required', 'integer', 'exists:users,id', Rule::unique('followers')->where('follower_id', $follower_id)->whereNot('follower_id', request()->following_id)]
            ]
        );
        $data['follower_id'] = $follower_id;

        Follower::create($data);
        return back();



    }
}