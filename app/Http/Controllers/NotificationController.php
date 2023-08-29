<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function show(Request $request)
    {
        $notifications = $request->user()->notifications()->orderBy('created_at', 'desc')
            ->get();
        return view('notification.index', ['notifications' => $notifications]);
    }
    public static function store($follower_id, $user_id, $action, $body = null)
    {

        $existingNotification = Notification::where([
            'sender_id' => $follower_id,
            'user_id' => $user_id,
            'action' => $action,
            'body' => $body
        ])->first();

        // Delete the existing notification if found
        if ($existingNotification) {
            $existingNotification->delete();
        }
        Notification::create([
            'sender_id' => $follower_id,
            'user_id' => $user_id,
            'action' => $action,
            'body' => $body
        ]);

    }

}