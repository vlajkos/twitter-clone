<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <section class="mt-10">
        <div class="max-w-sm mx-auto">
            @foreach ($tweets as $tweet)
                <header class="flex">
                    <a href="/{{ $tweet->author }}" class="mr-4">
                        <h3 class="font-bold">{{ $tweet->author->name }}</h3>
                    </a>
                    <a href="/{{ $tweet->author }}" class="mr-4">
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
            @endforeach
        </div>
    </section>
</x-app-layout>
