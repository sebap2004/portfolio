<div class="m-3">
    @if($hasSearchQuery)
        <h1 class="text-3xl">Search results for <strong>{{$search}}</strong>:</h1>
    @else
        <h1 class="text-3xl">Welcome back, {{auth()->user()->name}}!</h1>
        <h2 class="text-3xl mb-3"><strong>Featured</strong></h2>
    @endif


    <div class="lg:grid lg:grid-cols-8 lg:grid-flow-row sm:grid-cols-1 md:grid-cols-2 sm:grid-flow-col gap-4">
        @foreach($songs as $song)
            <x-app.song-card
                cover-directory="{{$song->cover_directory}}"
                song-name="{{$song->song_name}}"
                artist-name="{{$song->artist_name}}"
                album-name="{{$song->albumName}}"
                user="{{$song->user->username}}"
                song-i-d="{{$song->song_ID}}"
            />
        @endforeach
    </div>
</div>
