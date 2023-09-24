@props(['tweet', 'user'])
<section class="mt-4 flex w-full">
    @if ($tweet->tweet_id)
        @php $author = $tweet->originalTweet->author @endphp
        <x-profile-photo :user=$author class="mt-8 mr-2" customClass="w-12 h-12" />
    @else
        <x-profile-photo :user=$user class="mt-1 mr-2" customClass="w-12 h-12" />
    @endif

    <div class="relative mb-2 w-full">
        @if ($tweet->tweet_id)
            <a href="{{ $tweet->originalTweet->author->username }}/status/{{ $tweet->originalTweet->id }}"
                class="w-full h-full absolute z-0"></a>
        @else
            <a href="/{{ $user->username }}/status/{{ $tweet->id }}" class="w-full h-full absolute z-0"></a>
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
                <p class="bg-green-100 break-words">{{ $tweet->originalTweet->body }}</p>
            </div>
        @else
            <div class="">
                <p class="bg-green-100 break-words">{{ $tweet->body }}</p>
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
