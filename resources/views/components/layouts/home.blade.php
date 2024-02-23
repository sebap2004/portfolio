<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Page Title' }}</title>
</head>
<body>
<x-home.navbar/>
<section class="px-6 py-8 flex justify-center">
    <main class="max-w-screen-2xl mx-2 mt-10 lg:mt-20 space-y-6">
        {{ $slot }}
    </main>
</section>
</body>
</html>
