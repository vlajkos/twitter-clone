@props(['tweet'])
<header class="flex">
    <a href="/{{ $tweet->author->username }}" class="mr-4 relative hover:underline z-5">
        <h3 class="font-bold">{{ $tweet->author->name }}</h3>
    </a>
    <a href="/{{ $tweet->author->username }}" class="mr-4 relative z-5">
        {{ '@' . $tweet->author->username }}
    </a>
    @if ($tweet->created_at->diffInHours(now()) > 24)
        <time>{{ $tweet->created_at->format('F j') }}</time>
    @else
        <time>{{ $tweet->created_at->diffForHumans() }}</time>
    @endif
</header>
