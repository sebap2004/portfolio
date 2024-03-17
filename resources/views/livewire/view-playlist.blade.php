<div class="w-full">
    <div class="flex">
        <div class="ml-4">
            <h1 class="text-5xl">{{$playlist->playlist_name}}</h1>
            <p class="mt-3">
                @if($playlist->songs()->count() == 1)
                    1 song
                @else
                    {{$playlist->songs()->count()}} songs
                @endif
            </p>
        </div>
    </div>
    <div class="mt-3 join join-vertical w-full rounded-xl">
        @foreach($songs as $song)
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
