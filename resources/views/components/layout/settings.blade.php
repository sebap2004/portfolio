<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/player.js')
    <title>{{ $title ?? 'Stylus Streaming' }}</title>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"/>
</head>
<body>
<main class="h-screen grid grid-cols-7 grid-rows-8">
    <x-settings.navbar/>
    <x-settings.sidebar>
        <h1 class="text-2xl pb-3">Actions</h1>
        <div class="space-y-2">
            <a class="btn btn-block bg-base-300">Edit Profile</a>
            <a class="btn btn-block bg-base-300" href="/manage/playlists" wire:navigate>Manage Playlists</a>
            <a class="btn btn-block bg-base-300" href="/manage/songs" wire:navigate>Manage Songs</a>
            <a class="btn btn-block bg-base-300" href="/manage/albums" wire:navigate>Manage Albums</a>
        </div>
    </x-settings.sidebar>
    <div class="m-7 mb-0 mt-4 col-span-6 row-span-7 flex justify-center overflow-auto">
        {{ $slot }}
    </div>
    @if(session()->has('success'))
        <x-flash/>
    @endif
</main>
</body>
</html>
