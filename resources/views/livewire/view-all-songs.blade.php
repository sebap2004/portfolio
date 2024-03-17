<div class="">
    @if($hasSearchQuery)
        <h1 class="text-3xl">Search results for <strong>{{$search}}</strong>:</h1>
    @else
        <h1 class="text-3xl">Welcome back, {{auth()->user()->name}}!</h1>
    @endif
    <div>
        <h2 class="text-3xl mb-3"><strong>Featured Songs</strong></h2>
        <div class="lg:grid lg:grid-cols-8 lg:grid-flow-row sm:grid-cols-1 md:grid-cols-2 sm:grid-flow-col gap-4">
            @foreach($songs as $song)
                <x-app.song-card
                    song-name="{{$song->song_name}}"
                    cover-directory="{{$song->cover_directory}}"
                    artist-name="{{$song->artist_name}}"
                    album-name="{{$song->album->album_name ?? null}}"
                    album-slug="{{$song->album->album_slug ?? null}}"
                    user="{{$song->artist->username}}"
                    song-i-d="{{$song->song_ID}}"
                />
            @endforeach
        </div>
    </div>
        <div>
            <h2 class="text-3xl my-3"><strong>Featured Albums</strong></h2>
            <div class="lg:grid lg:grid-cols-8 lg:grid-flow-row sm:grid-cols-1 md:grid-cols-2 sm:grid-flow-col gap-4">
                @foreach($albums as $album)
                    @if($album->songs->count() != 0)
                        <x-app.album-card
                            cover-directory="{{$album->cover_directory}}"
                            artist-name="{{$album->artist->name}}"
                            album-name="{{$album->album_name ?? null}}"
                            album-slug="{{$album->album_slug ?? null}}"
                            artist-username="{{$album->artist->username}}"
                            album-i-d="{{$album->album_ID}}"
                        />
                    @endif
                @endforeach
            </div>
        </div>
</div>
