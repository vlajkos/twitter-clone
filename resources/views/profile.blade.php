<x-app-layout>
    <x-slot name="header">
        <header class="mx-auto max-w-sm relative">
            <h2 class="font-black text-xl">{{ $user->name }}</h2>
            <form action="/follow" method="POST" class="absolute right-0 top-0">
                @csrf
                <input type="hidden" value="{{ $user->id }}" name="following_id">
                <button type="submit"
                    class="px-5 py-2 bg-black rounded-full font-bold text-white hover:bg-slate-800">Follow</button>
            </form>
            <p class="text-gray-500 mb-4">{{ '@' . $user->username }}</p>
            <time class="text-gray-500 ">Joined {{ request()->user()->created_at->format('F Y') }} </time>
            <div class="mt-4">
                <a href="" class="mr-6"><b>{{ count($user->following) }}</b> <span
                        class="text-gray-500">Following
                    </span>
                </a>
                <a href="" class=""><b>{{ count($user->followers) }}</b> <span
                        class="text-gray-500">Followers
                    </span></a>
            </div>
        </header>
    </x-slot>
    <section class="mt-10">

        <div class="max-w-sm mx-auto ">
            @foreach ($tweets as $tweet)
                <div class="relative">
                    <a href="status/{{ $tweet->id }}" class="w-full h-full absolute z-0"></a>
                    <header class="flex">
                        <a href="/{{ $tweet->author->username }}" class="mr-4 relative hover:underline z-5">
                            <h3 class="font-bold">{{ $tweet->author->name }}</h3>
                        </a>
                        <a href="/{{ $tweet->author->username }}" class="mr-4 relative z-5">
                            {{ '@' . $tweet->author->username }}
                        </a>
                        @if ($tweet->created_at->diffInHours(now()) > 24)
                            <time>{{ $tweet->created_at->format('F j') }}</time>
                        @else
                            <time>{{ $tweet->created_at->diffForHumans() }}</time>
                        @endif
                    </header>

                    <div class="bg-green-300  mb-10">

                        <p class="bg-green-300">{{ $tweet->body }}</p>

                    </div>

                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
