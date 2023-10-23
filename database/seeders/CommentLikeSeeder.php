<?php

namespace Database\Seeders;

use App\Models\commentLike;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class commentLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        function createCommentLike($user_id, $comment_id)
        {

            $like = new commentLike([
                'user_id' => $user_id,
                'comment_id' => $comment_id,
            ]);

            return $like->save();
        }
        $like = createCommentLike(2, 1);
        $like = createCommentLike(3, 1);
        $like = createCommentLike(20, 1);
        $like = createCommentLike(5, 1);
        $like = createCommentLike(30, 1);
        $like = createCommentLike(31, 1);
        $like = createCommentLike(32, 1);
        $like = createCommentLike(34, 1);


        $like = createCommentLike(2, 4);
        $like = createCommentLike(3, 4);
        $like = createCommentLike(20, 4);
        $like = createCommentLike(5, 4);
        $like = createCommentLike(30, 4);
        $like = createCommentLike(34, 4);
        $like = createCommentLike(32, 4);
        $like = createCommentLike(35, 4);

        $like = createCommentLike(2, 5);
        $like = createCommentLike(3, 5);
        $like = createCommentLike(20, 5);
        $like = createCommentLike(5, 5);
        $like = createCommentLike(30, 6);
        $like = createCommentLike(36, 6);
        $like = createCommentLike(32, 7);
        $like = createCommentLike(34, 8);

    }
}