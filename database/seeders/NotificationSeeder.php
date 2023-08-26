<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        function makeNotification($user_id, $sender_id, $body = null, $action = 'system')
        {
            if (!$body)
                $body = fake()->paragraph();
            $notification = new Notification([
                'body' => $body,
                'user_id' => $user_id,
                'sender_id' => $sender_id,
                'action' => $action


            ]);
            $notification->save();
        }
        makeNotification(1, 4, 'Test 1', 'like');
        makeNotification(1, 2, 'Test 2', 'follow');
        makeNotification(1, 6, 'Test 3', 'comment');

    }
}