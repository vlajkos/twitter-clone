<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        function makeComment($user_id, $tweet_id, $created_at = null)
        {
            if (!$created_at) {
                $created_at = now();
            }
            $body = fake()->paragraph();
            $comment = new Comment([
                'body' => $body,
                'user_id' => $user_id,
                'tweet_id' => $tweet_id,
                'created_at' => $created_at
            ]);
            return $comment->save();
        }

        $comment = makeComment(2, 1);
        $comment = makeComment(3, 1);
        $comment = makeComment(13, 1);

    }
}