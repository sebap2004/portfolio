@props(['songName', 'coverDirectory', 'artistName', 'artistUsername', 'songID'])

<div class="bg-base-300 p-3 flex justify-between flex-wrap items-center join-item"
     x-data="{ isHovered: false }"
     @mouseenter="isHovered = true"
     @mouseleave="isHovered = false"
     x-transition>
    <div class="flex flex-wrap items-center">
        <img class="pfp mr-3 rounded" src="{{Storage::url($coverDirectory)}}" alt="Laracasts Logo" width="60">
        <div>
            <p>{{$songName}}</p>
            <a href="/profile/{{$artistUsername}}" class="text-sm link link-hover">{{$artistName}}</a>
        </div>
    </div>
    <div x-transition class="z-10" x-show="isHovered">
        <div class="flex items-center">
            <button @click="playNewSong({{$songID}})" class="btn btn btn-primary btn-circle self-center rounded-full mx-2">
                <span class="material-symbols-outlined">play_arrow</span>
            </button>
            <button class="btn btn-secondary"
                    @click="$dispatch('start-set-playlist', {{$songID}})">
                <span class="material-symbols-outlined">playlist_add</span>
            </button>
        </div>
    </div>
</div>
