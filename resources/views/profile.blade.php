<x-app-layout>
    <x-slot name="header">
        <header class="mx-auto max-w-sm">
            <h2 class="font-black text-xl">{{ $tweets->first()->author->name }}</h2>
            <p class="text-gray-500 mb-4">{{ '@' . $tweets->first()->author->username }}</p>
            <time class="text-gray-500 ">Joined {{ request()->user()->created_at->format('F Y') }} </time>
            <div class="mt-4">
                <a href="" class="mr-6"><b>{{ count(request()->user()->following) }}</b> <span
                        class="text-gray-500">Following
                    </span>
                </a>
                <a href="" class=""><b>{{ count(request()->user()->followers) }}</b> <span
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
