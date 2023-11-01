<x-app-layout>
    <section class="mt-10">
        <div class="max-w-md mx-auto">

            <div class='flex items-center'>
                <x-profile-photo :user="$quote->author" class="mr-2" customClass="w-12 h-12" />
                <x-tweet.header :tweet="$quote" />
            </div>
            <div class="mb-10 bg-green-100">
                <p class="">{{ $quote->body }}</p>
                <div class="py-2">
                    <a href="{{ route('tweet.likes', ['user' => $user->username, 'tweet' => $quote->id]) }}">
                        <b>{{ count($quote->likes) }}</b> likes
                    </a>
                </div>

            </div>
            <x-tweet.comment-form :tweet="$quote" />
            @foreach ($quote->comments as $comment)
                <div class="mb-4 relative">
                    <a href="{{ '/' . $user->username }}/status/{{ $quote->id }}/comment/{{ $comment->id }}"
                        class="w-full h-full absolute z-0"></a>
                    <x-tweet.header :tweet="$comment" />
                    <div>
                        <p class="bg-green-100">{{ $comment->body }}</p>
                    </div>
                    <x-comment.menu :comment=$comment :user=$user :tweet=$quote />
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
