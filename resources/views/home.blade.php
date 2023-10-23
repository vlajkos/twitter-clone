<x-app-layout>
    <section class="mt-10">
        <x-tweet.create />
        @if (count($tweets))
            <div class="max-w-sm mx-auto">
                @foreach ($tweets as $tweet)
                    @php $user = $tweet->author @endphp
                    <x-tweet.show :tweet=$tweet :user=$user />
                @endforeach
            </div>
        @else
            <div class="max-w-sm mx-auto text-gray-500 text-lg">{{ ucfirst($user->name) }}
                Your friends haven't tweeted yet.
                Come back
                later!</div>
        @endif

    </section>
</x-app-layout>
