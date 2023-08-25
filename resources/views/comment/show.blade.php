<x-app-layout>
    <section class="mt-10">
        <div class="max-w-md mx-auto">
            <x-tweet.header :tweet="$comment" />
            <div class="mb-10 bg-green-100">
                <p class="">{{ $comment->body }}</p>
                <div class="py-2">
                    <a
                        href="{{ route('comment.likes', ['user' => $user->username, 'comment' => $comment->id, 'tweet' => $tweet->id]) }}">
                        <b>{{ count($comment->likes) }}</b> likes
                    </a>

                    {{-- <a href="{{ route('tweet.retweets', ['user' => $user->username, 'tweet' => $tweet->id]) }}"
                        class="ml-4">
                        <b>{{ count($comment->retweets) }}</b> retweets
                    </a> --}}
                </div>

            </div>
            {{-- <x-tweet.comment-form :tweet="$tweet" />
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
        </div> --}}
    </section>
</x-app-layout>
