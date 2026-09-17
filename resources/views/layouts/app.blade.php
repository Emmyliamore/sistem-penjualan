<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sistem Penjualan') }}</title>

        <!-- Alpine.js sudah di-handle oleh app.js di sini -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="bg-gray-100 text-gray-900 dark:bg-gray-950 dark:text-gray-100">

        <div class="min-h-screen">

            {{-- Sidebar --}}
            @include('layouts.navigation')

            {{-- Konten --}}
            <main class="ml-64 min-h-screen">
                {{ $slot }}
            </main>

        </div>

    </body>
</html>