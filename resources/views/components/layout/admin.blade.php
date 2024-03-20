<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @vite('resources/js/player.js')
    <title>{{ $title ?? 'Stylus Streaming' }}</title>

</head>
<body>
<main class="h-screen grid grid-cols-7 grid-rows-8">
    <x-admin.navbar/>
    <x-admin.sidebar>
        <h1 class="text-2xl pb-3">Admin actions</h1>
        <div class="space-y-2">
            <a class="btn btn-block bg-base-300" href="/admin/uploadsong" wire:navigate>Upload song</a>
            <a class="btn btn-block bg-base-300" href="/admin/newalbum" wire:navigate>Create new album</a>
            <a class="btn btn-block bg-base-300" href="/admin/managesongs" wire:navigate>Manage songs</a>
            <a class="btn btn-block bg-base-300" href="/admin/manageusers" wire:navigate>Manage users</a>
            <a class="btn btn-block bg-base-300" href="/admin/managealbums" wire:navigate>Manage Albums</a>
            <a class="btn btn-block bg-base-300" href="/admin/newartist" wire:navigate>Create new artist</a>
            <a class="btn btn-block bg-base-300" href="/admin/manageartists" wire:navigate>Manage artists</a>
            <a class="btn btn-block bg-base-300" href="/admin/newgenre" wire:navigate>Create new genre</a>
            <a class="btn btn-block bg-base-300" href="/admin/managegenres" wire:navigate>Manage genres</a>
        </div>
    </x-admin.sidebar>
    <div class="m-7 mb-0 mt-4 col-span-6 row-span-7 flex justify-center overflow-auto">
        {{ $slot }}
    </div>
    @if(session()->has('success'))
        <x-flash/>
    @endif
    <livewire:toast/>
</main>
</body>
</html>
