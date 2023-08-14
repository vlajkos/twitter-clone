<x-app-layout>
    <section class="mt-10">
        <div class="max-w-md mx-auto">

            <x-tweet.header :tweet="$tweet" />
            <div class="mb-10 bg-green-100">
                <p class="">{{ $tweet->body }}</p>
                <div class="py-2">
                    <a href="{{ route('tweet.likes', ['user' => $user->username, 'tweet' => $tweet->id]) }}">
                        <b>{{ count($tweet->likes) }}</b> likes
                    </a>
                </div>

            </div>
        </div>
    </section>
</x-app-layout>
