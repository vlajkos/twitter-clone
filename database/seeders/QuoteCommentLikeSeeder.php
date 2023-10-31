<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\QuoteCommentLike;

class QuoteCommentLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        function createQuoteCommentLike($user_id, $quote_comment_id)
        {

            $like = new QuoteCommentLike([
                'user_id' => $user_id,
                'quote_comment_id' => $quote_comment_id,
            ]);

            return $like->save();
        }
        $quoteCommentLike = createQuoteCommentLike(1, 1);
        $quoteCommentLike = createQuoteCommentLike(1, 2);
        $quoteCommentLike = createQuoteCommentLike(5, 1);
        $quoteCommentLike = createQuoteCommentLike(6, 1);
    }
}
