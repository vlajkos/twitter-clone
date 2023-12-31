@props(['user', 'loggedUser'])
<div class="relative hover:bg-gray-200 py-6">

    <header class="relative flex ">
        @if ($user->image)
            <div class="self-start rounded-full h-14 w-14 mt-2 overflow-hidden bg-cover bg-center"
                style="background-image: url('/storage/images/{{ $user->image }}');"></div>
        @else
            <img class="self-start h-14 w-14 rounded-full mt-2" src="https://cdn-icons-png.flaticon.com/512/21/21104.png"
                alt="">
        @endif
        <div class="flex flex-col ml-2">
            <p class="font-bold">{{ $user->name }} </p>
            <p href="" class="text-gray-500">{{ '@' . $user->username }}</p>
        </div>



        @if ($loggedUser->id == $user->id)
        @elseif($loggedUser->following->contains($user))
            <form action="/unfollow" method="POST" class="absolute z-10 right-0 top-0">
                @csrf
                <input type="hidden" value="{{ $user->id }}" name="following_id">
                <button type="submit"
                    class="relative z-1 px-5 py-1 bg-black rounded-full font-bold text-white hover:bg-slate-700">Unfollow</button>
            </form>
        @else
            <form action="/follow" method="POST" class="absolute z-10 right-0 top-0">
                @csrf
                <input type="hidden" value="{{ $user->id }}" name="following_id">
                <button type="submit"
                    class="relative z-1 px-5 py-1 bg-black rounded-full font-bold text-white hover:bg-slate-700">Follow</button>
            </form>
        @endif
    </header>
    <p class="ml-16">{{ $user->bio }}</p>
    <a href="/{{ $user->username }}" class="absolute h-full w-full top-0"></a>
</div>
