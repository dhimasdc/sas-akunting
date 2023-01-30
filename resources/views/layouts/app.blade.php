<!DOCTYPE html>
<html :class="[dark ? 'dark' : 'light']" x-data="data()" lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Akuntan-SAS</title>
    <link rel="icon" href="{{ asset('img/logo/logo3.svg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="assets/css/tailwind.output.css" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('vendor/select2/dist/css/select2.min.css') }}" /> --}}
    <wireui:scripts />
    <script defer src="https://unpkg.com/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <link rel="stylesheet" href="{{ asset('css/css-o.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="{{ asset('assets/js/charts-lines.js') }}" defer></script>
    <script src="{{ asset('assets/js/charts-pie.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
    @livewireStyles
    @powerGridStyles
</head>

<body class="font-sans antialiased">
    <x-notifications position="top-right" />
    <div class="flex h-screen bg-gray-50 dark:bg-gray-800" :class="{ 'overflow-hidden': menuOpen }">
        <!-- Desktop sidebar -->
        <div class="fixed z-20 inset-0 bg-gray-500 opacity-80 transition-opacity lg:hidden"
            :class="menuOpen ? 'block' : 'hidden'" @click="menuOpen = false"></div>
        <aside :class="menuOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
            class="z-20 hidden w-64 bg-gray-50 dark:bg-gray-800 md:block flex-shrink-0 overflow-y-auto lg:translate-x-0 lg:inset-0 scrollbar-thin scrollbar-thumb-gray-500 scrollbar-track-gray-50 dark:scrollbar-track-gray-800">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold text-primary-500 dark:text-primary-200"
                    href="{{ route('dashboard') }}">
                    AKUNTAN
                </a>
                <ul class="mt-6">
                    <li x-data="{ linkActive: {{ request()->is('dashboard') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('dashboard') }}">
                            <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <div class="my-2 px-6 ">
                    <div class="border-b-2 border-gray-200"></div>
                </div>

                <ul>
                    <li x-data="{ linkActive: false, linkActives: {{ request()->is('user/penjualan/*') ? 'true' : 'false' }} }" @click="linkActive = !linkActive" class="relative px-6 py-3">
                        <span
                            :class="linkActives ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <button
                            class="inline-flex items-center justify-between w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActives ? 'font-semibold text-primary-500 dark:text-primary-200' : ''">
                            <span class="inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <span class="ml-4">Penjualan</span>
                            </span>
                            <svg class="w-3 h-3 transition duration-300" :class="linkActive ? 'rotate-90' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                        <!-- start::Submenu -->
                        <ul x-show="linkActive" x-cloak x-collapse.duration.300ms
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-100 dark:text-gray-400 dark:bg-gray-600">
                            <!-- start::Submenu link -->
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="{{ route('user.penjualan.overview') }}" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Overview</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="{{ route('user.penjualan.tagihan') }}" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Tagihan</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="{{ route('user.penjualan.pengiriman') }}" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Pengiriman</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="{{ route('user.penjualan.pemesanan') }}" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Pemesanan</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="{{ route('user.penjualan.penawaran') }}" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Penawaran</span>
                                </a>
                            </li>
                            <!-- end::Submenu link -->



                        </ul>
                        <!-- end::Submenu -->
                    </li>
                    <li x-data="{ linkActive: false, linkActives: {{ request()->is('user/pembelian/*') ? 'true' : 'false' }} }" @click="linkActive = !linkActive" class="relative px-6 py-3">
                        <span
                            :class="linkActives ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <button
                            class="inline-flex items-center justify-between w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActives ? 'font-semibold text-primary-500 dark:text-primary-200' : ''">
                            <span class="inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="ml-4">Pembelian</span>
                            </span>
                            <svg class="w-3 h-3 transition duration-300" :class="linkActive ? 'rotate-90' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                        <!-- start::Submenu -->
                        <ul x-show="linkActive" x-cloak x-collapse.duration.300ms
                            class="p-2 mt-2 space-y-2 overflow-hidden text-xs font-medium text-gray-500 rounded-md shadow-inner bg-gray-100 dark:text-gray-400 dark:bg-gray-600">
                            <!-- start::Submenu link -->
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="{{ route('user.pembelian.overview') }}" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Overview</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="{{ route('user.pembelian.tagihan') }}" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Tagihan Pembelian</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="{{ route('user.pembelian.pengiriman') }}" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Pengiriman Pembelian</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="{{ route('user.pembelian.pemesanan') }}" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Pemesanan Pembelian</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="{{ route('user.pembelian.penawaran') }}" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Penawaran Pembelian</span>
                                </a>
                            </li>
                            <!-- end::Submenu link -->
                        </ul>
                        <!-- end::Submenu -->
                    </li>

                    <div class="my-2 px-6 ">
                        <div class="border-b-2 border-gray-200"></div>
                    </div>

                    <li x-data="{ linkActive: {{ request()->is('user/pengeluaran') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('user.pengeluaran') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <span class="ml-4">Pengeluaran</span>
                        </a>
                    </li>
                    <li x-data="{ linkActive: {{ request()->is('user/produk') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('user.produk') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                            </svg>

                            <span class="ml-4">Produk</span>
                        </a>
                    </li>
                    <li x-data="{ linkActive: {{ request()->is('user/inventory') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('user.inventory') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            <span class="ml-4">Inventory</span>
                        </a>
                    </li>

                    <div class="my-2 px-6 ">
                        <div class="border-b-2 border-gray-200"></div>
                    </div>

                    <li x-data="{ linkActive: {{ request()->is('user/banking') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('user.banking') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                            </svg>
                            <span class="ml-4">Banking</span>
                        </a>
                    </li>
                    <li x-data="{ linkActive: {{ request()->is('user/akun') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('user.akun') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span class="ml-4">Akun</span>
                        </a>
                    </li>
                    <li x-data="{ linkActive: {{ request()->is('user/asset-tetap') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('user.asset-tetap') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span class="ml-4">Asset Tetap</span>
                        </a>
                    </li>
                    <li x-data="{ linkActive: {{ request()->is('user/laporan') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('user.laporan') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                            <span class="ml-4">Laporan</span>
                        </a>
                    </li>
                    <li x-data="{ linkActive: {{ request()->is('user/kontak') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('user.kontak') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="ml-4">Kontak</span>
                        </a>
                    </li>


                </ul>
            </div>
        </aside>

        <!-- Mobile sidebar -->

        <div x-show="menuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
        <aside
            class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-gray-50 dark:bg-gray-800 md:hidden"
            x-show="menuOpen" x-transition:enter="transition ease-in-out duration-150"
            x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu"
            @keydown.escape="closeSideMenu">
            <div class="py-4 text-gray-500 dark:text-gray-400">
                <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
                    Windmill
                </a>
                <ul class="mt-6">
                    <li x-data="{ linkActive: {{ request()->is('dashboard') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('dashboard') }}">
                            <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            <span class="ml-4">Dashboard</span>
                        </a>
                    </li>
                </ul>
                <div class="my-2 px-6 ">
                    <div class="border-b-2 border-gray-200"></div>
                </div>

                <ul>
                    <li x-data="{ linkHover: false, linkActive: {{ request()->is('user/penjualan/*') ? 'true' : 'false' }} }" @mouseover="linkHover = true" @mouseleave="linkHover = false"
                        @click="linkActive = !linkActive" class="relative px-6 py-3">
                        <button
                            class="inline-flex items-center justify-between w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100">
                            <span class="inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <span class="ml-4">Penjualan</span>
                            </span>
                            <svg class="w-3 h-3 transition duration-300" :class="linkActive ? 'rotate-90' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                        <!-- start::Submenu -->
                        <ul x-show="linkActive" x-cloak x-collapse.duration.300ms
                            class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-100 dark:text-gray-400 dark:bg-gray-600">
                            <!-- start::Submenu link -->
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Overview</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Tagihan</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Pengiriman</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Pemesanan</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Penawaran</span>
                                </a>
                            </li>
                            <!-- end::Submenu link -->



                        </ul>
                        <!-- end::Submenu -->
                    </li>
                    <li x-data="{ linkHover: false, linkActive: {{ request()->is('user/penjualan/*') ? 'true' : 'false' }} }" @mouseover="linkHover = true" @mouseleave="linkHover = false"
                        @click="linkActive = !linkActive" class="relative px-6 py-3">
                        <button
                            class="inline-flex items-center justify-between w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100">
                            <span class="inline-flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span class="ml-4">Pembelian</span>
                            </span>
                            <svg class="w-3 h-3 transition duration-300" :class="linkActive ? 'rotate-90' : ''"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                        <!-- start::Submenu -->
                        <ul x-show="linkActive" x-cloak x-collapse.duration.300ms
                            class="p-2 mt-2 space-y-2 overflow-hidden text-xs font-medium text-gray-500 rounded-md shadow-inner bg-gray-100 dark:text-gray-400 dark:bg-gray-600">
                            <!-- start::Submenu link -->
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Overview</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Tagihan Pembelian</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Pengiriman Pembelian</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Pemesanan Pembelian</span>
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 ">
                                <a href="" class="flex items-left">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2zM10 8.5a.5.5 0 11-1 0 .5.5 0 011 0zm5 5a.5.5 0 11-1 0 .5.5 0 011 0z" />
                                    </svg>
                                    <span class="overflow-ellipsis text-sm">Penawaran Pembelian</span>
                                </a>
                            </li>
                            <!-- end::Submenu link -->
                        </ul>
                        <!-- end::Submenu -->
                    </li>

                    <div class="my-2 px-6 ">
                        <div class="border-b-2 border-gray-200"></div>
                    </div>

                    <li x-data="{ linkActive: {{ request()->is('user/pengeluaran') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                            <span class="ml-4">Pengeluaran</span>
                        </a>
                    </li>
                    <li x-data="{ linkActive: {{ request()->is('user/produk') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                            </svg>

                            <span class="ml-4">Produk</span>
                        </a>
                    </li>
                    <li x-data="{ linkActive: {{ request()->is('user/inventory') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            <span class="ml-4">Inventory</span>
                        </a>
                    </li>

                    <div class="my-2 px-6 ">
                        <div class="border-b-2 border-gray-200"></div>
                    </div>

                    <li x-data="{ linkActive: {{ request()->is('user/banking') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z" />
                            </svg>
                            <span class="ml-4">Banking</span>
                        </a>
                    </li>
                    <li x-data="{ linkActive: {{ request()->is('user/akun') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <span class="ml-4">Akun</span>
                        </a>
                    </li>
                    <li x-data="{ linkActive: {{ request()->is('user/asset-tetap') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span class="ml-4">Asset Tetap</span>
                        </a>
                    </li>
                    <li x-data="{ linkActive: {{ request()->is('user/laporan') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                            </svg>
                            <span class="ml-4">Laporan</span>
                        </a>
                    </li>
                    <li x-data="{ linkActive: {{ request()->is('user/kontak') ? 'true' : 'false' }} }" class="relative px-6 py-3">
                        <span
                            :class="linkActive ?
                                'absolute inset-y-0 left-0 w-1 bg-primary-500 dark:bg-primary-300 rounded-tr-lg rounded-br-lg' :
                                ''">
                        </span>
                        <a class="inline-flex items-center w-full text-sm text-gray-800 transition-colors duration-150 hover:text-primary-500 dark:hover:text-primary-500 dark:text-gray-100"
                            :class="linkActive ? 'font-semibold text-primary-500 dark:text-primary-200' : ''"
                            href="{{ route('dashboard') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span class="ml-4">Kontak</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="flex flex-col flex-1 w-full">
            <header class="z-10 py-4 bg-gray-50 shadow-md dark:bg-gray-800">
                <div
                    class="container flex items-center justify-between h-full px-6 mx-auto text-primary-500 dark:text-primary-200">
                    <!-- Mobile hamburger -->
                    <button
                        class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-primary-500"
                        x-data="sideMenu()" @click="menuOpen = true" aria-label="Menu">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <!-- Search input -->
                    <div class="flex justify-center flex-1 lg:mr-32">
                        <div class="relative w-full max-w-xl mr-6 focus-within:text-primary-500">

                        </div>
                    </div>
                    <ul class="flex items-center flex-shrink-0 space-x-6">
                        <!-- Theme toggler -->
                        <li class="flex">
                            <button class="rounded-md focus:outline-none focus:shadow-outline-primary-500"
                                @click="toggleTheme" aria-label="Toggle color mode" wire:ignore>
                                <template x-if="!dark">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z">
                                        </path>
                                    </svg>
                                </template>
                                <template x-if="dark">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </template>
                            </button>
                        </li>
                        <!-- Notifications menu -->
                        <li class="relative" x-data="{ linkActive: false }">
                            <!-- start::Main link -->
                            <div @click="linkActive = !linkActive" class="cursor-pointer flex">
                                <svg class="w-6 h-6 cursor-pointer hover:text-primary dark:text-gray-100"
                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                    </path>
                                </svg>
                                <sub>
                                    <span
                                        class="bg-red-600 text-gray-100 px-1.5 py-0.5 rounded-full -ml-1 animate-pulse">
                                        4
                                    </span>
                                </sub>
                            </div>
                            <!-- end::Main link -->

                            <!-- start::Submenu -->
                            <div x-show="linkActive" @click.away="linkActive = false" x-cloak
                                class="absolute right-0 w-96 top-11 border border-gray-300 z-10">
                                <!-- start::Submenu content -->
                                <div class="bg-white rounded max-h-96 overflow-y-scroll soft-scrollbar">
                                    <!-- start::Submenu header -->
                                    <div class="flex items-center justify-between px-4 py-2">
                                        <span class="font-bold">Notifications</span>
                                        <span class="text-xs px-1.5 py-0.5 bg-red-600 text-gray-100 rounded">
                                            4 new
                                        </span>
                                    </div>
                                    <hr>
                                    <!-- end::Submenu header -->
                                    <!-- start::Submenu link -->
                                    <a x-data="{ linkHover: false }" href="#"
                                        class="flex items-center justify-between py-4 px-3 hover:bg-gray-100 bg-opacity-20"
                                        @mouseover="linkHover = true" @mouseleave="linkHover = false">
                                        <div class="flex items-center">
                                            <svg class="w-8 h-8 bg-primary-500 dark:bg-primary-300 bg-opacity-20 text-primary px-1.5 py-0.5 rounded-full"
                                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                                </path>
                                            </svg>
                                            <div class="text-sm ml-3">
                                                <p class="text-gray-600 font-bold capitalize"
                                                    :class=" linkHover ? 'text-primary' : ''">Order Completed</p>
                                                <p class="text-xs">Your order is completed</p>
                                            </div>
                                        </div>
                                        <span class="text-xs font-bold">
                                            5 min ago
                                        </span>
                                    </a>
                                    <!-- end::Submenu link -->

                                </div>
                                <!-- end::Submenu content -->
                            </div>
                            <!-- end::Submenu -->
                        </li>
                        <!-- Profile menu -->
                        <li x-data="{ linkActive: false }" class="relative">
                            <!-- start::Main link -->
                            <div @click="linkActive = !linkActive" class="cursor-pointer">
                                {{-- <img 
                                        src="./../../assets/img/profile.jpg"
                                        class="w-10 rounded-full"
                                    > --}}
                                <!-- Current Profile Photo -->
                                @auth

                                    <img src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"
                                        class="rounded-full w-10 object-cover">

                                @endauth
                            </div>
                            <!-- end::Main link -->

                            <!-- start::Submenu -->
                            <div x-show="linkActive" @click.away="linkActive = false" x-cloak
                                class="absolute right-0 w-40 top-11 border rounded border-gray-300 dark:border-gray-700 z-20">
                                <!-- start::Submenu content -->
                                <div class="bg-white rounded dark:bg-gray-800">
                                    <!-- start::Submenu link -->
                                    <a x-data="{ linkHover: false }" href="./../profile.html"
                                        class="flex items-center justify-between py-2 px-3 hover:bg-gray-100 bg-opacity-20"
                                        @mouseover="linkHover = true" @mouseleave="linkHover = false">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                                                </path>
                                            </svg>
                                            <div class="text-sm ml-3">

                                                <p class="text-gray-600 dark:text-gray-400 font-bold capitalize"
                                                    :class=" linkHover ? 'text-primary' : ''">Profile</p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- end::Submenu link -->
                                    <!-- start::Submenu link -->
                                    <a x-data="{ linkHover: false }" href="./../email/inbox.html"
                                        class="flex items-center justify-between py-2 px-3 hover:bg-gray-100 bg-opacity-20"
                                        @mouseover="linkHover = true" @mouseleave="linkHover = false">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            <div class="text-sm ml-3">
                                                <p class="text-gray-600 dark:text-gray-400 font-bold capitalize"
                                                    :class=" linkHover ? 'text-primary' : ''">
                                                    Inbox
                                                    <span
                                                        class="bg-red-600 text-gray-100 text-xs px-1.5 py-0.5 ml-2 rounded">3</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- end::Submenu link -->
                                    <!-- start::Submenu link -->
                                    <a x-data="{ linkHover: false }" href="./../settings.html"
                                        class="flex items-center justify-between py-2 px-3 hover:bg-gray-100 bg-opacity-20"
                                        @mouseover="linkHover = true" @mouseleave="linkHover = false">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                                                </path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                            <div class="text-sm ml-3">
                                                <p class="text-gray-600 dark:text-gray-400 font-bold capitalize"
                                                    :class=" linkHover ? 'text-primary' : ''">Settings</p>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- end::Submenu link -->

                                    <hr>

                                    <!-- start::Submenu link -->
                                    <form method="POST" action="{{ route('logout') }}" x-data="{ linkHover: false }"
                                        class="flex items-center justify-between py-2 px-3 hover:bg-gray-100 bg-opacity-20"
                                        @mouseover="linkHover = true" @mouseleave="linkHover = false">
                                        @csrf
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                                                </path>
                                            </svg>
                                            <a class="ml-2 text-red-600"href="{{ route('logout') }}"
                                                @click.prevent="$root.submit();">
                                                {{ __('Log Out') }}
                                            </a>
                                        </div>
                                    </form>
                                    <!-- end::Submenu link -->
                                </div>
                                <!-- end::Submenu content -->
                            </div>
                            <!-- end::Submenu -->
                        </li>
                    </ul>
                </div>
            </header>

            {{-- main --}}

            <main class="h-full bg-gray-200 dark:bg-gray-600 overflow-y-auto">
                <div class="container p-6 mx-auto grid">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('vendor/flowbite/dist/flowbite.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/flowbite/dist/datepicker.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    @stack('modals')
    @stack('scripts')

    @powerGridScripts
    {{-- <script type="module">
        import hotwiredTurbo from 'https://cdn.skypack.dev/@hotwired/turbo';
      </script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js"
        data-turbolinks-eval="false" data-turbo-eval="false"></script> --}}
    <script>
        function sideMenu() {
            return {
                isSideMenuOpen: false,
                toggleSideMenu() {
                    this.isSideMenuOpen = !this.isSideMenuOpen
                },
                closeSideMenu() {
                    this.isSideMenuOpen = false
                },
            }
        }
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
    @livewire('livewire-ui-modal')
    @livewireScripts
    @livewireChartsScripts
</body>

</html>
