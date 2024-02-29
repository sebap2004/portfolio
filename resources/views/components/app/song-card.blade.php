@props(['songName', 'coverDirectory', 'albumName', 'artistName', 'user', 'songID'])
<div class="shadow-lg col-span-2 p-2 rounded-2xl bg-base-200">
    <img class="aspect-square p-8" src="{{ Storage::url($coverDirectory)  }}" alt="{{$songName}}">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{$songName}}</div>
        <a class="text-gray-700 text-base {{is_null($user) ? '' : 'link link-hover'}}" href="/profile/{{$user}}" wire:navigate>
            {{$artistName}}
        </a>
        <p class="text-gray-700 text-base">
            {{$albumName}}
        </p>
    </div>
    <div class="px-6 py-4">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Tag1</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Tag2</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#Tag3</span>
    </div>
    <div class="px-6 pt-4 pb-2">
        <button class="btn btn-lg btn-primary btn-circle self-center rounded-full mx-2" onclick="loadSong({{$songID}})"><span class="material-symbols-outlined">
play_arrow
</span></button>
        <button class="btn btn-secondary">Add to Playlist</button>
    </div>
</div>
