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
            <form action="/tweet" method="POST" class="max-w-sm flex flex-col items-end px-4 rounded-xl mx-auto">
                @csrf
                <input type="text" name="body" id="body" class="w-full border-0 bg-gray-100"
                    placeholder="What is happening?!">
                <button type="submit"
                    class="rounded-full bg-blue-500 hover:bg-blue-700 text-white px-6 py-2  m-2 font-semibold">Post</button>
                <hr class="my-6 border-gray-300  w-full">
            </form>
        @endif
        @if (count($tweets))
            <div class="max-w-sm mx-auto">
                @foreach ($tweets as $tweet)
                    <div class="relative mb-10">
                        <a href="{{ $user->username }}/status/{{ $tweet->id }}"
                            class="w-full h-full absolute z-0"></a>

                        <x-tweet.header :tweet="$tweet" />

                        <div>

                            <p class="bg-green-100">{{ $tweet->body }}</p>

                        </div>
                        <x-tweet.menu :tweet=$tweet :user=$user />
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
