<x-app-layout>
    <section class="mt-10">
        <div class="max-w-md mx-auto">
            @foreach ($notifications as $notification)
                <div class="pb-4 flex">

                    @php
                        $sender = $notification->sender;
                        $action = $notification->action;
                    @endphp
                    @if ($action == 'like' || $action == 'comment_like')
                        <img src="{{ asset('images/heart.png') }}" alt="" class="self-start h-6 w-6  mr-2 mt-3">
                    @elseif($action == 'comment')
                        <img src="{{ asset('images/comment.png') }}" alt="" class="self-start h-6 w-6  mr-2 mt-3">
                    @elseif($action == 'retweet')
                        <img src="{{ asset('images/repost.png') }}" alt="" class="self-start h-6 w-6 mr-2 mt-3">
                    @else
                        <div class="w-8"></div>
                    @endif

                    <div>
                        <div class=" flex flex-row mb-2">

                            <x-profile-photo :user=$sender customClass="w-8 h-8 mt-1 mr-1" />
                            <time class="self-end">{{ $notification->created_at->diffForHumans() }}</time>
                        </div>

                        <p><a href="" class="font-bold">{{ $notification->sender->username }} </a>
                            @php $action = $notification->action @endphp
                            @if ($action == 'like')
                                liked your tweet
                            @elseif($action == 'comment_like')
                                liked your comment
                            @elseif($action == 'comment')
                                commented your tweet
                            @elseif($action == 'retweet')
                                reposted your tweet
                            @elseif($action == 'follow')
                                is now following you
                            @endif


                        </p>
                        <p class="text-gray-600">{{ $notification->body }}</p>

                    </div>


                </div>
                <hr>
            @endforeach
        </div>
    </section>
</x-app-layout>
