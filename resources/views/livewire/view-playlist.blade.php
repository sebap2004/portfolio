<div>
    <x-backbutton/>
    <div class="flex">
        <div class="ml-4">
            <h1 class="text-5xl">{{$playlist->playlist_name}}</h1>
            <div class="flex items-center">
                <button @click="loadPlaylist({{$playlist->playlist_ID}})" class="btn btn-lg btn-primary btn-circle  rounded-full mx-2"><span
                        class="material-symbols-outlined">
play_arrow
</span></button>
                <p>
                    @if($playlist->songs()->count() == 1)
                        1 song
                    @else
                        {{$playlist->songs()->count()}} songs
                    @endif
                </p>
            </div>

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
