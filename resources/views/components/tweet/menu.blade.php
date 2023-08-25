@props(['tweet', 'user'])

<div class="relative z-20 flex justify-around">

    <div class="flex">
        <button type="submit" class="w-4 mr-2">
            <img src="{{ asset('images/comment.png') }}" alt="" class="block">
        </button>
        <a href="">
            @if ($tweet->tweet_id)
                {{ count($tweet->originalTweet->comments) }}
            @else
                {{ count($tweet->comments) }}
            @endif
        </a>
    </div>

    <form action="/like" method="POST" class="flex">
        @csrf
        <input type="hidden" name="user_id" value="{{ request()->user()->id }}">
        <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
        <button type="submit" class="w-4 mr-2">
            <img src="{{ asset('images/heart.png') }}" alt="" class="block">
        </button>

        <a href="{{ '/' . $user->username . '/status/' . $tweet->id . '/likes' }}">
            @if ($tweet->tweet_id)
                {{ count($tweet->originalTweet->likes) }}
            @else
                {{ count($tweet->likes) }}
            @endif
        </a>
    </form>

    <form action="/retweet" method="POST" class="flex">
        @csrf
        <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
        <input type="hidden" name="body" value="{{ $tweet->body }}">
        <button type="submit" class="w-4 mr-2">
            <img src="{{ asset('images/repost.png') }}" alt="" class="block">
        </button>


        <a href="">
            @if ($tweet->tweet_id)
                {{ count($tweet->originalTweet->retweets) }}
            @else
                {{ count($tweet->retweets) }}
            @endif
        </a>


    </form>
</div>
