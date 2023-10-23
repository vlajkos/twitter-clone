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

        $tweet = createTweet(2, now());
        $tweet = createTweet(1, now()->subDay());
        $tweet = createTweet(1, '2023-07-05 18:56:41');
        $tweet = createTweet(1, '2023-07-09 18:56:41');
        $tweet = createTweet(1, '2023-07-04 18:56:41');
        $tweet = createTweet(1, '2023-06-05 18:56:41');
        $tweet = createTweet(1, '2023-08-21 18:56:41');
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
        $tweet = createTweet(15, now()->subHours(23), 2);
        $tweet = createTweet(16, now()->subHours(22), 2);
        $tweet = createTweet(21, now()->subHours(21), 1);
        $tweet = createTweet(23, now()->subHours(17), 3);

        $tweet = createTweet(30, now());
        $tweet = createTweet(31, now());
        $tweet = createTweet(32, now()->subDay(), 3);


        $tweet = createTweet(1, now(), 23);
        $tweet = createTweet(1, '2023-01-15 18:56:41', 25);

        $tweet = createTweet(2, now()->subDays(2), 1);
        $tweet = createTweet(2, now()->subMonth(), 3);


        $tweet = createTweet(4, '2023-05-15 18:56:41');
        $tweet = createTweet(4, '2023-04-04 18:56:41');
        $tweet = createTweet(4, '2023-08-22 18:56:41', 7);
        $tweet = createTweet(4, '2023-08-01 18:56:41', 8);
        $tweet = createTweet(4, '2023-09-01 14:56:41', 9);
        $tweet = createTweet(4, now()->subDays(3));

        $tweet = createTweet(4, now()->subDays(12));
        $tweet = createTweet(5, now()->subDays(10));
        $tweet = createTweet(6, now()->subDays(4));


        $tweet = createTweet(2, now()->subHours(23));
        $tweet = createTweet(3, now()->subHours(4));
    }
}