<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteComment;

class QuoteCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        function makeQuoteComment($user_id, $quote_id, $created_at = null)
        {
            if (!$created_at) {
                $created_at = now();
            }
            $body = fake()->paragraph();
            $comment = new QuoteComment([
                'body' => $body,
                'user_id' => $user_id,
                'quote_id' => $quote_id,
                'created_at' => $created_at
            ]);
            return $comment->save();
        }


        $quoteComment = makeQuoteComment(2, 1, now()->subDay());
        $quoteComment = makeQuoteComment(3, 1, now()->subDays(2));
    }
}
