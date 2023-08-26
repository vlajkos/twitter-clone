<x-app-layout>
    <section class="mt-10">
        <div class="max-w-md mx-auto">
            @foreach ($notifications as $notification)
                <div class="mb-4 flex">

                    @php $action = $notification->action @endphp
                    @if ($action == 'like')
                        <img src="{{ asset('images/heart.png') }}" alt="" class="self-start h-6 w-6  mr-2 mt-3">
                    @elseif($action == 'comment')
                        <img src="{{ asset('images/comment.png') }}" alt="" class="self-start h-6 w-6  mr-2 mt-3">
                    @elseif($action == 'retweet')
                        <img src="{{ asset('images/repost.png') }}" alt="" class="self-start h-6 w-6 mr-2 mt-3">
                    @else
                        <div class="w-8"></div>
                    @endif
                    <div>
                        <img src="{{ asset('images/user.png') }}" alt=""
                            class="self-start h-8 w-8 rounded-full mr-4 mt-2">
                        <p><a href="" class="font-bold">{{ $notification->sender->username }} </a>
                            @php $action = $notification->action @endphp
                            @if ($action == 'like')
                                liked your tweet
                            @elseif($action == 'comment')
                                commented your tweet
                            @elseif($action == 'retweet')
                                reposted your tweet
                            @elseif($action == 'follow')
                                is now following you
                            @endif


                        </p>
                        <p>{{ $notification->body }}</p>
                    </div>

                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
