@props(['tweet'])
<form action="/comment" method="POST" class="max-w-sm flex flex-col items-end px-4 rounded-xl mx-auto">
    @csrf
    <input type="text" name="body" id="body" class="w-full border-0 bg-gray-100" placeholder="Post your comment!">
    <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
    <button type="submit"
        class="rounded-full bg-blue-500 hover:bg-blue-700 text-white px-6 py-2  m-2 font-semibold">Post</button>
    <hr class="my-6 border-gray-300  w-full">
</form>
