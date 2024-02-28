<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/player.js')
    <title>{{ $title ?? 'Stylus Streaming' }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
<x-app.navbar/>
<section class="flex flex-col justify-center">
    <main class="w-full h-90 flex">
        <x-app.sidebar>
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-sm btn-circle btn-primary"><span class="material-symbols-outlined">
add
</span></div>
                <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-300 rounded-box w-52">
                    <li><a href="/app/upload" wire:navigate>New Song</a></li>
                    <li><a>New Playlist</a></li>
                    <li><a>New Album</a></li>
                </ul>
            </div>
            <h1 class="text-2xl pb-3">Playlists</h1>
            <a class="btn btn-block bg-base-300">Playlist 1</a>
        </x-app.sidebar>
        <div class="m-7 overflow-y-auto w-screen">
            {{ $slot }}
        </div>
    </main>
    @persist('player')
    <x-music-player/>
    @endpersist
</section>
@if(session()->has('success'))
    <x-flash/>
@endif
</body>
</html>
