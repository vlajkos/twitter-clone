<form action="{{ route('tweets.search') }}" {{ $attributes->merge(['class' => 'flex rounded-2xl h-10']) }} method="GET">
    <button type="submit" class="self-center ml-4 absolute">
        <img src="{{ asset('images/search.png') }}" alt="" class="block w-4 h-4 ">
    </button>
    <input name="query" type="text" placeholder="Search"
        class="border-0 px-10 bg-gray-100 rounded-full placeholder-gray-500 w-80 focus:border-transparent focus:ring-0  focus:border-[1px] focus:border-blue-400">
</form>
