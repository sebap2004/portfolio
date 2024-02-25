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
<section class="px-6 flex justify-center">
    <main class="max-w-screen-2xl mx-2">
        <div class="drawer lg:drawer-open absolute left-0">
            <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
            <div class="drawer-content flex flex-col items-center justify-center">
                <!-- Page content here -->
                <label for="my-drawer-2" class="btn btn-primary drawer-button lg:hidden">Open drawer</label>

            </div>
            <div class="drawer-side">
                <label for="my-drawer-2" aria-label="close sidebar" class="drawer-overlay"></label>
                <ul class="menu p-4 w-80 min-h-full bg-base-300/20 text-base-content border-base-100 border-2 border-l-base-300">
                    <!-- Sidebar content here -->
                    <h1>Playlists</h1>
                    <li><a>Sidebar Item 1</a></li>
                    <li><a>Sidebar Item 2</a></li>
                </ul>

            </div>
        </div>
        {{ $slot }}
    </main>
    <div class="fixed min-w-full bg-base-300 p-5 flex justify-center items-center mx-2 bottom-0">
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
