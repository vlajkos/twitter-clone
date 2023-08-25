@props(['comment', 'user', 'tweet'])

<div class="relative z-20 flex justify-around">
    <form action="/like_comment" method="POST" class="flex">
        @csrf
        <input type="hidden" name="user_id" value="{{ request()->user()->id }}">
        {{-- <input type="hidden" name="tweet_id" value="{{ $tweet->id }}"> --}}
        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
        <button type="submit" class="w-4 mr-2">
            <img src="{{ asset('images/heart.png') }}" alt="" class="block">
        </button>

        <a href="{{ '/' . $user->username . '/comment/' . $comment->id . '/likes' }}">
            {{ count($comment->likes) }}
        </a>
    </form>

    {{-- <form action="/retweet_comment" method="POST" class="flex">
        @csrf
        <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="hidden" name="comment_id" value="{{ $comment->id }}">
        <input type="hidden" name="body" value="{{ $comment->body }}">
        <button type="submit" class="w-4 mr-2">
            <img src="{{ asset('images/repost.png') }}" alt="" class="block">
        </button>


        <a href="">

            {{ count($comment->originalComment->retweets) }}

        </a>

    </form> --}}
</div>
