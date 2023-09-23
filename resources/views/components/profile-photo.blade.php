@props(['user'])
<div {{ $attributes->merge([]) }}>
    @if ($user->image)
        <div class="self-start rounded-full h-12 w-12 overflow-hidden bg-cover bg-center"
            style="background-image: url('/storage/images/{{ $user->image }}');"></div>
    @else
        <img class="self-start h-12 w-12 rounded-full" src="https://cdn-icons-png.flaticon.com/512/21/21104.png"
            alt="">
    @endif
</div>
