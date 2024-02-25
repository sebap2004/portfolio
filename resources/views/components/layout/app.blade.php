<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{ $title ?? 'Stylus Streaming' }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
<x-app.navbar/>
<section class="flex flex-col justify-center">
    <main class="w-full h-90 flex">
        <x-app.sidebar>
            <h1 class="text-2xl pb-3">Playlists</h1>
            <a class="btn btn-block bg-base-300">Playlist 1</a>
        </x-app.sidebar>
        <div class="m-7 overflow-y-auto w-screen">
            {{ $slot }}
        </div>
    </main>
    <div class="fixed min-w-full bg-base-300 p-5 flex justify-center items-center bottom-0 align-middle">
        <button class="btn btn-sm btn-circle btn-primary rounded-full mx-2"><span class="material-symbols-outlined">
skip_previous
</span></button>
        <button class="btn btn-lg btn-primary btn-circle  rounded-full mx-2"><span class="material-symbols-outlined">
play_arrow
</span></button>
        <button class="btn btn-sm btn-circle btn-primary rounded-full mx-2"><span class="material-symbols-outlined">
skip_next
</span></button>
    </div>
</section>
@if(session()->has('success'))
    <x-flash />
@endif
</body>
</html>
