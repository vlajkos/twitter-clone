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
            <x-tweet.comment-form :tweet="$tweet" />
            @foreach ($tweet->comments as $comment)
                <div class="mb-4 relative">
                    <a href="{{ '/' . $user->username }}/status/{{ $tweet->id }}/comment/{{ $comment->id }}"
                        class="w-full h-full absolute z-0"></a>
                    <x-tweet.header :tweet="$comment" />
                    <div>
                        <p class="bg-green-100">{{ $comment->body }}</p>
                    </div>
                    <x-comment.menu :comment=$comment :user=$user :tweet=$tweet />
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
