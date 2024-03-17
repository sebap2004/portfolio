<div class="flex flex-col">
    @if($artist)
        <img src="{{Storage::url($artist->pfp_directory)}}" class="pfp rounded-full w-36">
        <h1 class="text-4xl mb-0">{{ $artist->name }}</h1>
        <h2 class="text-xl">{{ $artist->username }}</h2>
        <p class="text text-sm">Joined {{$artist->created_at->diffForHumans()}}</p>
        <p class="mt-4 {{$artist->bio ? '' : 'text-gray-700'}}">{{$user->bio ?? 'No bio'}}</p>
        @if($artist->artist_ID === auth()->user()->artist->artist_ID)
            <a class="btn btn-primary w-36 my-3" href="{{ url()->current() }}/edit" wire:navigate>Edit profile</a>
        @endif
        <h2 class="text-3xl mb-3"><strong>Songs</strong></h2>
        <div class="lg:grid lg:grid-cols-8 lg:grid-flow-row sm:grid-cols-1 md:grid-cols-2 sm:grid-flow-col gap-4">
            @foreach($songs as $song)
                <x-app.song-card
                    song-name="{{$song->song_name}}"
                    cover-directory="{{$song->cover_directory}}"
                    artist-name="{{$song->artist_name}}"
                    album-name="{{$song->album->album_name ?? null}}"
                    album-slug="{{$song->album->album_slug ?? null}}"
                    user="{{$song->artist}}"
                    song-i-d="{{$song->song_ID}}"
                />
            @endforeach
        </div>
        <h2 class="text-3xl my-3"><strong>Albums</strong></h2>
        <div class="lg:grid lg:grid-cols-8 lg:grid-flow-row sm:grid-cols-1 md:grid-cols-2 sm:grid-flow-col gap-4">
            @foreach($artist->albums as $album)
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
    @else
        <p>No user found</p>
    @endif
</div>
