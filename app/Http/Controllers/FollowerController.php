<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\Notification;
use App\Models\User;
use App\Rules\DifferentFollower;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FollowerController extends Controller
{

    public function listFollowers(User $user)
    {

        return view('followers', ['user' => $user, 'users' => $user->followers]);
    }

    public function listFollowing(User $user)
    {

        return view('followers', ['user' => $user, 'users' => $user->following]);
    }
    public function store()
    {


        $follower_id = request()->user()->id;

        $data = request()->validate(
            [
                'following_id' => [
                    'required',
                    'integer',
                    'exists:users,id',
                    new DifferentFollower($follower_id),
                    Rule::unique('followers')->where('follower_id', $follower_id)
                ]
            ]
        );

        $data['follower_id'] = $follower_id;


        Follower::create($data);

        NotificationController::store($follower_id, $data['following_id'], 'follow');

        return back();



    }
    public function destroy()
    {
        $follower_id = request()->user()->id;
        $data = request()->validate(
            [
                'following_id' => ['required', 'integer', Rule::exists('followers', 'following_id')->where('follower_id', $follower_id)]
            ]
        );
        Follower::where('following_id', $data['following_id'])->where('follower_id', $follower_id)->delete();
        return back();
    }
}