<x-app-layout>
    <section class="mt-10">
        <div class="max-w-md mx-auto">
            <div class="flex">

                <div class="flex-1 hover:bg-gray-300 py-4">

                    <p class="text-lg font-bold">Likes</p>

                </div>

            </div>
            <hr>
            @php
                $loggedUser = $user;
            @endphp
            @if (count($users))
                @foreach ($users as $user)
                    <x-tweet.show-follower :user=$user :loggedUser=$loggedUser />
                @endforeach
            @else
                <p>This tweet currently has no likes.</p>
            @endif
        </div>
    </section>
</x-app-layout>
