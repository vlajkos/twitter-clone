@props(['tweet', 'user'])
<div class="relative z-20 flex justify-around">

    <div class="flex">
        <button type="submit" class="w-4 mr-2">
            <img src="{{ asset('images/comment.png') }}" alt="" class="block">
        </button>
        <a href="">

            {{ count($tweet->comments) }}

        </a>
    </div>


    <form action="/like" method="POST" class="flex">
        @csrf
        <input type="hidden" name="user_id" value="{{ request()->user()->id }}">
        <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
        <button type="submit" class="w-4 mr-2">
            @if ($tweet['isLikedByCurrentUser'])
                <img src="{{ asset('images/heart-full.png') }}" alt="" class="block">
            @else
                <img src="{{ asset('images/heart.png') }}" alt="" class="block">
            @endif

        </button>

        <a href="{{ '/' . $user->username . '/status/' . $tweet->id . '/likes' }}">

            {{ count($tweet->likes) }}

        </a>
    </form>

    <form action="/retweet" method="POST" class="flex">
        @csrf
        <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
        <input type="hidden" name="body" value="{{ $tweet->body }}">
        <button type="submit" class="w-4 mr-2">
            <img src="{{ asset('images/repost.png') }}" alt="" class="block">
        </button>




    </form>
</div>
