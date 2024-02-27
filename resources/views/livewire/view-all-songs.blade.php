<div>
<h1 class="text-3xl">Welcome back, {{auth()->user()->name}}!</h1>
    <div class="lg:grid lg:grid-cols-8 lg:grid-flow-row sm:grid-cols-1 md:grid-cols-2 sm:grid-flow-col gap-4">
        @foreach($songs as $song)
            <x-app.song-card
                cover-directory="{{$song->cover_directory}}"
                song-name="{{$song->song_name}}"
                artist-name="{{$song->artist_name}}"
                album-name="{{$song->albumName}}"
            />
        @endforeach
    </div>
</div>
