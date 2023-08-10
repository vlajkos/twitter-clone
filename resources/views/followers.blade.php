<x-app-layout>
    <section class="mt-10">
        <div class="max-w-md mx-auto">
            <div class="flex">
                <div class="flex-1  text-center hover:bg-gray-300">
                    <a class="font-bold text-gray-500 block py-4 @if (request()->path() == $user->username . '/followers') text-black underline @endif"
                        href="{{ '/' . $user->username }}/followers">Followers</a>

                </div>

                <div class="flex-1  text-center hover:bg-gray-300 ">
                    <a class="font-bold text-gray-500 block py-4 @if (request()->path() == $user->username . '/following') text-black underline @endif"
                        href="{{ '/' . $user->username }}/following">Following</a>
                    <h1></h1>

                </div>

            </div>
            <hr>
            @foreach ($users as $user)
                <div class="hover:bg-gray-300 py-6">
                    <header class="relative flex"><img
                            class="self-start h-8 w-8 rounded-full mr-4 mt-2"src="https://cdn-icons-png.flaticon.com/512/21/21104.png"
                            alt="">
                        <div class="flex flex-col"><a href="" class="font-bold">{{ $user->name }} </a>
                            <a href="" class="text-gray-500">{{ '@' . $user->username }}</a>

                        </div>
                        <form action="/follow" method="POST" class="absolute right-0 top-0">
                            @csrf
                            <input type="hidden" value="{{ $user->id }}" name="following_id">
                            <button type="submit"
                                class="px-5 py-1 bg-black rounded-full font-bold text-white hover:bg-slate-800">Follow</button>
                        </form>
                    </header>
                    <p class="ml-12">{{ $user->bio }}</p>


                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
