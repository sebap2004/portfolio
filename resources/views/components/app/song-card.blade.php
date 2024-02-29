@props(['songName', 'coverDirectory', 'albumName', 'artistName', 'user', 'songID'])

<div x-data="{ isHovered: false }"
     class="shadow-lg col-span-2 p-2 rounded-2xl bg-base-200 relative"
     @mouseenter="isHovered = true"
     @mouseleave="isHovered = false">

    <div class="relative">
        <img class="aspect-square p-8 z-0" src="{{ Storage::url($coverDirectory) }}" alt="{{$songName}}">

        <div class="absolute bottom-0 left-0 p-4 z-10" x-show="isHovered" x-transition>
            <div class="flex items-center">
                <button class="btn btn-lg btn-primary btn-circle self-center rounded-full mx-2" onclick="loadSong({{$songID}})">
                    <span class="material-symbols-outlined">play_arrow</span>
                </button>
                <button class="btn btn-secondary">Add to Playlist</button>
            </div>
        </div>
    </div>

    <div class="px-6 py-4 relative z-10">
        <div class="font-bold text-xl mb-2">{{$songName}}</div>
        <a class="text-gray-700 text-base {{is_null($user) ? '' : 'link link-hover'}}" href="/profile/{{$user}}" wire:navigate>
            {{$artistName}}
        </a>
        <p class="text-gray-700 text-base">
            {{$albumName}}
        </p>
    </div>
</div>



