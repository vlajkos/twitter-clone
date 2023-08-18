<x-app-layout>
    <section class="mt-10">
        <div class="max-w-md mx-auto">
            <div class="flex">

                <div class="flex-1 hover:bg-gray-300 py-4">

                    @if ($reaction == 'retweet')
                        <p class="text-lg font-bold">Retweets</p>
                    @else
                        <p class="text-lg font-bold">Likes</p>
                    @endif

                </div>

            </div>
            <hr>




            @php
                $loggedUser = request()->user();
            @endphp
            @if (count($users))
                @foreach ($users as $user)
                    <x-tweet.show-follower :user=$user :loggedUser=$loggedUser />
                @endforeach
            @else
                @if ($reaction == 'retweet')
                    <p>This tweet currently has no retweets.</p>
                @else
                    <p>This tweet currently has no likes.</p>
                @endif
            @endif
        </div>
    </section>
</x-app-layout>
