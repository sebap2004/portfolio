@props(['coverDirectory', 'albumName', 'albumSlug', 'artistName', 'artistUsername', 'albumID'])

<div x-data="{ showContextMenu: false, isHovered: false }"
     class="shadow-lg col-span-2 p-2 rounded-2xl bg-base-200 relative"
     @contextmenu.prevent = "showContextMenu = true"
     @click.away="showContextMenu = false"
     @mouseenter="isHovered = true"
     @mouseleave="isHovered = false; showContextMenu = false"
     :class="{ 'hover:shadow-xl': !showContextMenu }">

    <div class="relative">
        <img class="aspect-square w-full p-8 z-0" :src="`{{ Storage::url($coverDirectory) }}`" alt="{{$albumName}}">

        <!-- Context Menu -->
        <div class="absolute dropdown top-0 right-0 p-2 bg-base-300 rounded-lg shadow-md z-10"
             x-show="showContextMenu"
             x-transition
             @click.away="showContextMenu = false">
            <button @click="addAlbumToQueue({{$albumID}}); showContextMenu = false;" class="flex items-center w-full rounded text-left px-4 py-2  hover:bg-gray-200 hover:text-base-100">
                <span class="material-symbols-outlined mr-2">playlist_add</span> Add to queue
            </button>
        </div>
        <!-- End Context Menu -->

        <!-- Play and Add to Playlist Buttons -->
        <div x-transition class="absolute bottom-0 left-0 p-4 z-10" x-show="isHovered">
            <div class="flex items-center">
                <button class="btn btn-lg btn-primary btn-circle self-center rounded-full mx-2" @click="loadAlbum({{$albumID}})">
                    <span class="material-symbols-outlined">play_arrow</span>
                </button>
                <button class="btn btn-secondary">
                    <span class="material-symbols-outlined">playlist_add</span> Add to playlist
                </button>
            </div>
        </div>
        <!-- End Play and Add to Playlist Buttons -->
    </div>

    <div class="px-6 py-4 relative z-10">
        <div class="font-bold text-xl">
            <a href="/album/{{$albumSlug}}">{{$albumName}}</a>
        </div>
        <div>
            <a class="text-base text-gray-500 link link-hover" href="/profile/{{$artistUsername}}" wire:navigate>
                {{ $artistName }}
            </a>
        </div>
    </div>
</div>
