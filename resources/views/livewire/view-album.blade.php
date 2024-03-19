<div>
<x-backbutton/>
    <div class="flex">
        <img class="pfp mr-2" src="{{Storage::url($album->cover_directory)}}" width="200" height="200">
        <div class="ml-4">
            <h1 class="text-5xl">{{$album->album_name}}</h1>
            <div class="flex flex-wrap items-center">
                <span><img width="30" class="pfp rounded-full mr-2" src="{{ \App\Models\Artist::find($album->artist_ID)->pfp_directory ? Storage::url( \App\Models\Artist::find($album->artist_ID)->pfp_directory) : "/images/defaultpfp.jpg" }}"></span>
                <h2 class="text-xl"><a class="link link-hover" href="/profile/{{\App\Models\Artist::find($album->artist_ID)->username}}" wire:navigate>{{\App\Models\Artist::find($album->artist_ID)->name}}</a></h2>
            </div>
            <p class="mt-3">
                @if($album->songs()->count() == 1)
                    1 song
                @else
                    {{$album->songs()->count()}} songs
                @endif
            </p>
        </div>
    </div>
    <div class="mt-3 join join-vertical w-full rounded-xl">
        @foreach($album->songs as $song)
            <x-app.song-list
                song-name="{{$song->song_name}}"
                song-i-d="{{$song->song_ID}}"
                artist-name="{{$song->artist->name}}"
                artist-username="{{$song->artist->username}}"
                cover-directory="{{$song->cover_directory}}"
            />
        @endforeach
    </div>
</div>
