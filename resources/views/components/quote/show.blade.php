@props(['tweet', 'user'])
<section class="mt-4 flex w-full">

    <x-profile-photo :user=$user class="mt-1 mr-2" customClass="w-12 h-12" />

    <div class="relative mb-2 w-full">

        <a href="/{{ $user->username }}/quote/{{ $tweet->id }}" class="w-full h-full absolute z-0"></a>




        <x-tweet.header :tweet="$tweet" />



        <div class="">
            <p class="bg-green-100 break-words">{{ $tweet->body }}</p>
        </div>
        <div class="border border-gray-300 p-2 mt-2 rounded-xl">

            <div class='flex'>
                <x-profile-photo :user="$tweet->tweet->author" class="mr-2" customClass="w-6 h-6" />
                <x-tweet.header :tweet="$tweet->tweet" />
            </div>

            <a href="/{{ $tweet->tweet->author->username }}/status/{{ $tweet->tweet->id }}"
                class="w-full h-full absolute z-1"></a>
            <p class="break-words">{{ $tweet->tweet->body }}</p>
        </div>


        <x-quote.menu :tweet='$tweet' :user='$user' />

    </div>
</section>
