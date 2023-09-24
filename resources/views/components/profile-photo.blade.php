@props(['user', 'customClass' => ''])
<div {{ $attributes->merge([]) }}>
    @if ($user->image)
        <div class="self-start rounded-full overflow-hidden bg-cover bg-center {{ $customClass }}"
            style="background-image: url('/storage/images/{{ $user->image }}');"></div>
    @else
        <img class="self-start rounded-full  {{ $customClass }}"
            src="https://cdn-icons-png.flaticon.com/512/21/21104.png" alt="">
    @endif
</div>
