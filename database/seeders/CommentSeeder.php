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

        $comment = makeComment(1, 7, '2023-08-21 19:56:41');
        $comment = makeComment(5, 7, '2023-08-21 20:56:41');
        $comment = makeComment(2, 7, '2023-08-21 21:56:41');

        $comment = makeComment(1, 8, '2023-02-01 21:56:41');
        $comment = makeComment(5, 8, '2023-08-21 22:56:41');
        $comment = makeComment(2, 8, '2023-08-21 23:56:41');

    }
}