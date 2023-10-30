<?php

namespace Database\Seeders;


use App\Models\Quote;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        function createQuote($user_id, $tweet_id, $created_at)
        {
            $body = fake()->paragraph();

            $quote = new Quote([
                'user_id' => $user_id,
                'tweet_id' => $tweet_id,
                'body' => $body,
                'created_at' => $created_at,
                'updated_at' => $created_at
            ]);

            return $quote->save();
        }
        $quote =  createQuote(1, 12, '2023-03-15 18:56:41');
        $quote =  createQuote(1, 23, '2023-10-15 18:56:41');
    
        

    }
}
