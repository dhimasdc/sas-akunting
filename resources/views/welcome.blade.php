<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Akuntan-SAS</title>
    <link rel="icon" href="{{ asset('img/logo/logo3.svg') }}">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.4.2/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.4.2/dist/cdn.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

    <!-- Styles -->

    @livewireStyles
</head>

<body class="font-sans antialiased">
    <!-- This example requires Tailwind CSS v3.0+ -->
    <div class="isolate bg-white h-screen">
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]">
            <svg class="relative left-[calc(50%-11rem)] -z-10 h-[21.1875rem] max-w-none -translate-x-1/2 rotate-[30deg] sm:left-[calc(50%-30rem)] sm:h-[42.375rem]"
                viewBox="0 0 1155 678" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill="url(#45de2b6b-92d5-4d68-a6a0-9b9b2abad533)" fill-opacity=".3"
                    d="M317.219 518.975L203.852 678 0 438.341l317.219 80.634 204.172-286.402c1.307 132.337 45.083 346.658 209.733 145.248C936.936 126.058 882.053-94.234 1031.02 41.331c119.18 108.451 130.68 295.337 121.53 375.223L855 299l21.173 362.054-558.954-142.079z" />
                <defs>
                    <linearGradient id="45de2b6b-92d5-4d68-a6a0-9b9b2abad533" x1="1155.49" x2="-78.208"
                        y1=".177" y2="474.645" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#9089FC"></stop>
                        <stop offset="1" stop-color="#FF80B5"></stop>
                    </linearGradient>
                </defs>
            </svg>
        </div>
        <main>
            <div class="relative px-6 lg:px-12">
                <div class="mx-auto max-w-1xl pt-20 pb-20 sm:pt-42 sm:pb-38">

                    <section>
                        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
                            <div class="mr-auto place-self-center lg:col-span-7">
                                <h1
                                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-slate-700">
                                    Smart Accounting System</h1>
                                <p
                                    class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                                    Sistem akuntansi pintar.</p>

                                @if (Route::has('login'))
                                    @auth
                                        @if (auth()->user()->role_id == 1)
                                            <a href="{{ route('admin.dashboard') }}"
                                                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-primary border border-gray-300 rounded-lg hover:bg-primary hover:text-white focus:ring-4 focus:ring-gray-100">
                                                Dashboard
                                            </a>
                                            <h2
                                                class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-primary rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                                                Hai!<span class="ml-1 font-bold"> {{ auth()->user()->name }}</span>
                                            </h2>
                                        @else
                                            <a href="{{ route('dashboard') }}"
                                                class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-primary border border-gray-300 rounded-lg hover:bg-primary hover:text-white focus:ring-4 focus:ring-gray-100">
                                                Dashboard
                                            </a>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}"
                                            class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-primary-500 border border-primary-500 rounded-lg hover:bg-primary-500 hover:text-white focus:ring-4 focus:ring-gray-100">
                                            Login
                                        </a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}"
                                                class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-primary-500 hover:bg-primary-300 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-500">
                                                Register
                                                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </a>
                                        @endif
                                    @endauth
                                @endif
                            </div>
                            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                                <img src="{{ asset('img/landing/Invoice-amico2.svg') }}" alt="mockup">
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </main>
    </div>
    @livewireScripts
    <script type="module">
  import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
</script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script> @powerGridScripts

</body>

</html>
