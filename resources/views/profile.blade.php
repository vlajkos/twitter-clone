<x-app-layout>
    <x-slot name="header">


        <header class="mx-auto max-w-sm relative">
            <h2 class="font-black text-xl">{{ $user->name }}</h2>
            @if ($user == request()->user())
            @elseif (request()->user()->following->contains($user))
                <form action="/unfollow" method="POST" class="absolute right-0 top-0">
                    @csrf
                    <input type="hidden" value="{{ $user->id }}" name="following_id">
                    <button type="submit"
                        class="px-5 py-2 bg-black rounded-full font-bold text-white hover:bg-slate-800">Unfollow</button>
                </form>
            @else
                <form action="/follow" method="POST" class="absolute right-0 top-0">
                    @csrf
                    <input type="hidden" value="{{ $user->id }}" name="following_id">
                    <button type="submit"
                        class="px-5 py-2 bg-black rounded-full font-bold text-white hover:bg-slate-800">Follow</button>
                </form>
            @endif
            <p class="text-gray-500">{{ '@' . $user->username }}</p>
            @if ($user->bio)
                <p class="py-2">{{ $user->bio }}</p>
            @endif
            <time class="text-gray-500 ">Joined {{ request()->user()->created_at->format('F Y') }} </time>
            <div class="mt-4">
                <a href="{{ $user->username . '/following' }}" class="mr-6"><b>{{ count($user->following) }}</b>
                    <span class="text-gray-500">Following
                    </span>
                </a>
                <a href="{{ $user->username . '/followers' }}" class=""><b>{{ count($user->followers) }}</b>
                    <span class="text-gray-500">Followers
                    </span></a>
            </div>
        </header>

    </x-slot>
    <section class="mt-10">
        @if ($user->username == request()->user()->username)
            <x-tweet.create />
        @endif
        @if (count($tweets))
            <div class="max-w-sm mx-auto">
                @foreach ($tweets as $tweet)
                    <div class="relative mb-10">
                        @if ($tweet->tweet_id)
                            <a href="{{ $tweet->originalTweet->author->username }}/status/{{ $tweet->originalTweet->id }}"
                                class="w-full h-full absolute z-0"></a>
                        @else
                            <a href="{{ $user->username }}/status/{{ $tweet->id }}"
                                class="w-full h-full absolute z-0"></a>
                        @endif
                        @if ($tweet->tweet_id)
                            <div class="flex">
                                <img src="{{ asset('images/repost.png') }}" alt=""
                                    class="block w-4 h-4 mr-2 self-center">
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
                @endforeach

            </div>
        @else
            <div class="max-w-sm mx-auto text-gray-500 text-lg">{{ ucfirst($user->name) }} hasn't tweeted Yet!
                Come back
                later!</div>
        @endif
    </section>
</x-app-layout>
