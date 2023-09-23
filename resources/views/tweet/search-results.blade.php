<x-app-layout>
    <section class="mt-10">
        @if (count($tweets))
            <div class="max-w-sm mx-auto">
                @foreach ($tweets as $tweet)
                    @php $user = $tweet->author @endphp
                    <x-tweet.show :tweet=$tweet :user=$user />
                @endforeach
            </div>
        @else
            <div class="max-w-sm mx-auto text-gray-500 text-lg  mt-60">
                No tweets are found with requested query!</div>
        @endif

    </section>
</x-app-layout>
