<x-app-layout>
    <x-slot name="header">


        <header class="mx-auto max-w-sm relative">

            <div class="flex">
                <x-profile-photo :user=$user class="mr-2" customClass="w-12 h-12" />
                <div>
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
                </div>
            </div>
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
            <div class="max-w-sm mx-auto relative">
                @foreach ($tweets as $tweet)
                    @php $user = $tweet->author @endphp
                    <x-tweet.show :tweet=$tweet :user=$user />
                @endforeach

            </div>
        @else
            <div class="max-w-sm mx-auto text-gray-500 text-lg">{{ ucfirst($user->name) }} hasn't tweeted Yet!
                Come back
                later!</div>
        @endif
    </section>
</x-app-layout>
