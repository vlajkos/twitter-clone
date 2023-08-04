<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <form action="/post" method="POST" class="max-w-xl flex flex-col items-end bg-white p-8 rounded-xl mx-auto">
        @csrf
        <input type="text" name="body" id="body" class="w-full" placeholder="What is happening?!">

        <hr class="my-8 border-gray-300  w-full">
        <button type="submit"
            class="rounded-full bg-blue-500 hover:bg-blue-700 text-white px-6 py-2 font-semibold">Post</button>
    </form>
</x-app-layout>
