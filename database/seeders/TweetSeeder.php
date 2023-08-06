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
        function createTweet($user_id, $created_at)
        {
            $body = fake()->paragraph();

            $tweet = new Tweet([
                'user_id' => $user_id,
                'body' => $body,
                'created_at' => $created_at,
                'updated_at' => $created_at
            ]);

            return $tweet->save();
        }

        $tweet = createTweet(1, '2023-07-05 18:56:41');
        $tweet = createTweet(1, '2023-07-09 18:56:41');
        $tweet = createTweet(1, '2023-07-04 18:56:41');
        $tweet = createTweet(1, '2023-06-05 18:56:41');
        $tweet = createTweet(1, '2023-05-21 18:56:41');
        $tweet = createTweet(1, '2023-02-01 18:56:41');
        $tweet = createTweet(1, '2023-05-02 18:56:41');
        $tweet = createTweet(1, '2023-03-25 18:56:41');
        $tweet = createTweet(2, '2023-01-15 18:56:41');
        $tweet = createTweet(2, '2023-08-06 18:56:41');
        $tweet = createTweet(2, '2023-08-05 18:56:41');
    }
}