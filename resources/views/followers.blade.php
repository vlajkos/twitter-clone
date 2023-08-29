<x-app-layout>
    <section class="mt-10">
        <div class="max-w-md mx-auto">
            <div class="flex">

                <div class="flex-1  text-center hover:bg-gray-300">
                    <a class="font-bold text-gray-500 block py-4 @if (request()->path() == $user->username . '/followers') text-slate-900 underline @endif"
                        href="{{ '/' . $user->username }}/followers">Followers</a>

                </div>

                <div class="flex-1  text-center hover:bg-gray-300 ">
                    <a class="font-bold text-gray-500 block py-4 @if (request()->path() == $user->username . '/following') text-slate-900 underline @endif"
                        href="{{ '/' . $user->username }}/following">Following</a>


                </div>

            </div>
            <hr>
            @php
                $loggedUser = request()->user();
            @endphp
            @foreach ($users as $user)
                <x-tweet.show-follower :user=$user :loggedUser=$loggedUser />
            @endforeach
        </div>
    </section>
</x-app-layout>
