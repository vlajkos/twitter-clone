<?php

namespace Database\Seeders;

use App\Models\Tweet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TweetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        function createTweet($user_id, $created_at, $tweet_id = null)
        {
            $body = fake()->paragraph();

            $tweet = new Tweet([
                'user_id' => $user_id,
                'body' => $body,
                'tweet_id' => $tweet_id,
                'created_at' => $created_at,
                'updated_at' => $created_at
            ]);

            return $tweet->save();
        }

        $tweet = createTweet(1, now()->subDay());
        $tweet = createTweet(1, now());
        $tweet = createTweet(1, '2023-07-05 18:56:41');
        $tweet = createTweet(1, '2023-07-09 18:56:41');
        $tweet = createTweet(1, '2023-07-04 18:56:41');
        $tweet = createTweet(1, '2023-06-05 18:56:41');
        $tweet = createTweet(1, '2023-05-21 18:56:41');
        $tweet = createTweet(1, '2023-02-01 18:56:41');
        $tweet = createTweet(1, '2023-05-02 18:56:41');
        $tweet = createTweet(1, '2023-03-25 18:56:41');




        $tweet = createTweet(2, now()->subDay());
        $tweet = createTweet(2, '2023-01-15 18:56:41');
        $tweet = createTweet(2, '2023-08-06 18:56:41');
        $tweet = createTweet(2, '2023-08-05 18:56:41');
        $tweet = createTweet(2, '2023-01-15 18:56:41');
        $tweet = createTweet(2, '2023-08-04 18:56:41');
        $tweet = createTweet(2, '2023-08-03 18:56:41');
        $tweet = createTweet(2, '2023-08-01 18:56:41');
        $tweet = createTweet(2, '2023-08-01 14:56:41');

        $tweet = createTweet(3, now()->subDay());
        $tweet = createTweet(3, '2023-01-15 18:56:41');
        $tweet = createTweet(3, '2023-08-06 18:56:41');
        $tweet = createTweet(3, '2023-08-05 18:56:41');
        $tweet = createTweet(3, '2023-01-15 18:56:41');
        $tweet = createTweet(3, '2023-08-04 18:56:41');
        $tweet = createTweet(3, '2023-08-03 18:56:41');
        $tweet = createTweet(3, '2023-08-01 18:56:41');
        $tweet = createTweet(3, '2023-08-01 14:56:41');



        $tweet = createTweet(1, now()->subDay(), 16);
        $tweet = createTweet(1, '2023-01-15 18:56:41', 17);
        $tweet = createTweet(15, now(), 2);
        $tweet = createTweet(16, now(), 2);
        $tweet = createTweet(21, now(), 1);
        $tweet = createTweet(23, now(), 3);

        $tweet = createTweet(30, now(), 2);
        $tweet = createTweet(31, now(), 1);
        $tweet = createTweet(32, now(), 3);


        $tweet = createTweet(1, now(), 23);
        $tweet = createTweet(1, '2023-01-15 18:56:41', 25);

        $tweet = createTweet(2, now()->subDay(), 1);
        $tweet = createTweet(2, '2023-07-15 18:56:41', 2);
    }
}