<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex h-full  place-content-center ">
    <div class="flex items-center basis-4/5 justify-between">
        <x-application-logo class="w-80 h-80" />

        <div class="h-4/5">
            <p class="font-extrabold text-7xl mb-8">Happening now</p>
            <p class="font-extrabold text-3xl mb-6">Join today.</p>

            <div class="w-80 flex flex-col ">



                <div class="mb-14 w-full flex flex-col"><a href="{{ route('register') }}"
                        class="font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2  mb-2 rounded-3xl w-full text-center py-2 bg-green-500">Create
                        account</a>
                    <p class="text-[12px] leading-3 ml-2">By signing up, you agree to the <a
                            class="text-green-600">Terms of
                            Service</a>
                        and <a class="text-green-600">Privacy Policy
                        </a>,
                        including <a class="text-green-600">Cookie Use. <a></p>
                </div>



                <p class="mb-4 ml-2 text-xl font-bold">Already have an account?</p>
                <a href="{{ route('login') }}"
                    class="font-bold mb-4  text-green-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2  border-black rounded-3xl w-full text-center py-2 border">Sign
                    in
                </a>
            </div>


        </div>


    </div>
</body>

</html>
