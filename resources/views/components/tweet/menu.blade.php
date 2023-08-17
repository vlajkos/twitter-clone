@props(['tweet', 'user'])

<div class="relative z-20 flex justify-around">
    <form action="/like" method="POST" class="flex">
        @csrf
        <input type="hidden" name="user_id" value="{{ request()->user()->id }}">
        <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
        <button type="submit" class="w-4 mr-2">
            <img src="{{ asset('images/heart.png') }}" alt="" class="block">
        </button>
        <a href="{{ '/' . $user->username . '/status/' . $tweet->id . '/likes' }}">{{ count($tweet->likes) }}</a>
    </form>

    <form action="/retweet" method="POST" class="flex">
        @csrf
        <button type="submit" class="w-4 mr-2">
            <img src="{{ asset('images/repost.png') }}" alt="" class="block">
        </button>
        <a href="">0</a>
    </form>
</div>
