<?php

namespace Database\Seeders;

use App\Models\Like;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{

    public function run(): void
    {
        function createLike($user_id, $tweet_id)
        {

            $like = new Like([
                'user_id' => $user_id,
                'tweet_id' => $tweet_id,
            ]);

            return $like->save();
        }
        $like = createLike(2, 1);
        $like = createLike(3, 1);
        $like = createLike(20, 1);
        $like = createLike(5, 1);
        $like = createLike(30, 1);
        $like = createLike(31, 1);
        $like = createLike(32, 1);
        $like = createLike(34, 1);

        $like = createLike(2, 3);
        $like = createLike(3, 3);
        $like = createLike(20, 2);
        $like = createLike(5, 2);
        $like = createLike(30, 4);
        $like = createLike(31, 4);
        $like = createLike(32, 5);
        $like = createLike(34, 5);

        $like = createLike(2, 6);
        $like = createLike(3, 7);
        $like = createLike(20, 9);
        $like = createLike(5, 8);
        $like = createLike(30, 12);
        $like = createLike(31, 15);
        $like = createLike(32, 15);
        $like = createLike(34, 16);

        $like = createLike(2, 6);
        $like = createLike(3, 7);
        $like = createLike(20, 9);
        $like = createLike(5, 8);
        $like = createLike(30, 12);
        $like = createLike(31, 15);
        $like = createLike(32, 15);
        $like = createLike(34, 16);

        $like = createLike(1, 17);
        $like = createLike(3, 19);
        $like = createLike(20, 18);
        $like = createLike(5, 15);
        $like = createLike(30, 19);
        $like = createLike(31, 19);
        $like = createLike(32, 20);
        $like = createLike(34, 20);

        $like = createLike(1, 23);
        $like = createLike(3, 23);
        $like = createLike(20, 23);
        $like = createLike(5, 23);
        $like = createLike(30, 23);
        $like = createLike(31, 23);
        $like = createLike(32, 23);
        $like = createLike(34, 23);

        $like = createLike(2, 16);
        $like = createLike(4, 16);
        $like = createLike(1, 16);
        $like = createLike(5, 16);
        $like = createLike(37, 16);
        $like = createLike(38, 16);
        $like = createLike(39, 16);
        $like = createLike(34, 16);

    }
}