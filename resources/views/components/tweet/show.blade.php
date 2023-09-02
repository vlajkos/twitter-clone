@props(['tweet', 'user'])
<section class="mt-10">
    <div class="relative mb-10">
        @if ($tweet->tweet_id)
            <a href="{{ $tweet->originalTweet->author->username }}/status/{{ $tweet->originalTweet->id }}"
                class="w-full h-full absolute z-0"></a>
        @else
            <a href="{{ $user->username }}/status/{{ $tweet->id }}" class="w-full h-full absolute z-0"></a>
        @endif
        @if ($tweet->tweet_id)
            <div class="flex">
                <img src="{{ asset('images/repost.png') }}" alt="" class="block w-4 h-4 mr-2 self-center">
                @if ($user->id == request()->user()->id)
                    <p class="text-gray-500">You reposted</p>
                @else
                    <p class="text-gray-500">{{ $user->name }} reposted</p>
                @endif
            </div>
        @endif

        @if ($tweet->tweet_id)
            <x-tweet.header :tweet="$tweet->originalTweet" />
        @else
            <x-tweet.header :tweet="$tweet" />
        @endif

        @if ($tweet->tweet_id)
            <div class='border-2 border-black'>
                <p class="bg-green-100">{{ $tweet->originalTweet->body }}</p>
            </div>
        @else
            <div>
                <p class="bg-green-100">{{ $tweet->body }}</p>
            </div>
        @endif

        @if ($tweet->tweet_id)
            @php $originalTweet = $tweet->originalTweet @endphp
            <x-tweet.menu :tweet=$originalTweet :user=$user />
        @else
            <x-tweet.menu :tweet=$tweet :user=$user />
        @endif
    </div>
</section>
