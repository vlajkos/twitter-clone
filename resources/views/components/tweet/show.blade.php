@props(['tweet', 'user'])
<section class="mt-4 flex w-full">

    <x-profile-photo :user=$user class="mt-1 mr-2" customClass="w-12 h-12" />

    <div class="relative mb-2 w-full">

        <a href="/{{ $user->username }}/status/{{ $tweet->id }}" class="w-full h-full absolute z-0"></a>



        <x-tweet.header :tweet="$tweet" />



        <div class="">
            <p class="bg-green-100 break-words">{{ $tweet->body }}</p>
        </div>



        <x-tweet.menu :tweet=$tweet :user=$user />

    </div>
</section>
