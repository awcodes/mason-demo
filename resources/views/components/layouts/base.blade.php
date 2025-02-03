@props([
    'title' => config('app.name'),
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="https://dev-starter.test/favicon.svg">

        <title>{{ $title }}</title>

        @vite([
            'resources/css/app/app.css',
        ])

        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-50 dark:bg-gray-900 dark:text-gray-50">
        <header class="bg-white dark:bg-gray-950 border-b-4 border-primary-500">
            <div class="max-w-7xl mx-auto py-3 px-6 flex items-center justify-between">
                <a href="{{ route('welcome') }}" class="text-2xl font-bold">{{ config('app.name') }}</a>
                <div class="flex items-center gap-4">
                    <a href="/admin/login">Login</a>
                    <x-dimmer::controls />
                </div>
            </div>
        </header>
        <main class="max-w-7xl mx-auto p-6">
            {{ $slot }}
        </main>
        <footer>

        </footer>

        @livewireScripts
    </body>
</html>
