<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-200 text-gray-800">
            
            <!-- 🔹 Navbar -->
            <nav class="bg-[#736058] border-b border-gray-400 text-white shadow-sm">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        
                        <!-- Kiri: Logo & Menu -->
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ url('/') }}" class="text-xl font-bold text-white">
                                    {{ config('app.name', 'MYbini') }}
                                </a>
                            </div>

                            <!-- Menu -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <a href="/dashboard" class="text-white hover:text-blue-200 hover:underline px-3 py-2 font-medium">Dashboard</a>
                                <a href="/about" class="text-white hover:text-blue-200 hover:underline px-3 py-2 font-medium">About</a>
                                <a href="/contact" class="text-white hover:text-blue-200 hover:underline px-3 py-2 font-medium">Contact</a>
                            </div>
                        </div>

                        <!-- Kanan: Auth -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            @auth
                                <div class="ml-3 relative">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            <button class="flex items-center text-sm font-medium text-white hover:text-gray-200 focus:outline-none transition ease-in-out duration-150">
                                                <div>{{ Auth::user()->name }}</div>
                                                <div class="ml-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.25a.75.75 0 01-1.06 0L5.25 8.27a.75.75 0 01-.02-1.06z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <x-dropdown-link :href="route('profile.edit')">
                                                {{ __('Profile') }}
                                            </x-dropdown-link>

                                            <!-- Logout -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            @else
                                <a href="{{ route('login') }}" class="text-white hover:text-blue-200 px-3 py-2">Login</a>
                                <a href="{{ route('register') }}" class="text-white hover:text-blue-200 px-3 py-2">Register</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow-sm border-b border-gray-300 mt-4 mx-4 rounded-t-lg">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main class="py-8">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>