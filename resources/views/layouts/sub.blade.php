<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'SPEEHUNTERS') }} - {{$titulo}}</title>
        <link rel="icon" type="Images/png" href="{{url('favicon.png')}}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header>
            <nav x-data="{ open: false }" class="bg-carmesi fixed w-full z-50 top-0 start-0 shadow-lg dark:bg-gray-800">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <a href="{{ route('index') }}">
                                    <img class="block h-9 w-auto" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg" {{ $attributes }} src="{{url('/storage/imagenes/sh.png')}}" alt="Logo">
                                </a>
                                <a href="{{ route('index') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-gray-300 focus:outline-none focus:text-gray-300 transition duration-150 ease-in-out">SPEEDHUNTERS</a>
                            </div>
                        </div>            
                        @if (Route::has('login'))
                        <div class="flex items-center flex-shrink-0 text-white mr-6">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-gray-300 focus:outline-none focus:text-gray-300 transition duration-150 ease-in-out">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-gray-300 focus:outline-none focus:text-gray-300 transition duration-150 ease-in-out">Iniciar Sesión</a>
                            
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-white hover:text-gray-300 focus:outline-none focus:text-gray-300 transition duration-150 ease-in-out">Registrar</a>
                                @endif
                            @endauth
                        </div>
                        @endif
                    </div>
                </div>
            </nav>
        </header>
        <main class="mt-16 bg-gray-100 dark:bg-gray-500">
            <div class="font-sans text-gray-900 antialiased">
                {{ $slot }}
            </div>
        </main>
    </body>
</html>