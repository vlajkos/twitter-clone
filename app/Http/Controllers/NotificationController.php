<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function show(Request $request)
    {
        $notifications = $request->user()->notifications;
        return view('notification.index', ['notifications' => $notifications]);
    }
}