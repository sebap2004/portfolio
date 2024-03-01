<div class="flex flex-col">
    @if($user)
        <img src="{{Storage::url($user->pfp_directory)}}" class="pfp rounded-full w-36">
        <h1 class="text-4xl mb-0">{{ $user->name }}</h1>
        <h2 class="text-xl">{{ $user->username }}</h2>
        <p class="text text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
        <p class="mt-4 {{$user->bio ? '' : 'text-gray-700'}}">{{$user->bio ?? 'No bio'}}</p>
        @if($user->id === auth()->user()->id)
            <a class="btn btn-primary w-36 my-3" href="{{ url()->current() }}/edit" wire:navigate>Edit profile</a>
        @endif
        <h2 class="text-3xl mb-3"><strong>Songs</strong></h2>
        <div class="lg:grid lg:grid-cols-8 lg:grid-flow-row sm:grid-cols-1 md:grid-cols-2 sm:grid-flow-col gap-4">
            @foreach($songs as $song)
                <x-app.song-card
                    cover-directory="{{$song->cover_directory}}"
                    song-name="{{$song->song_name}}"
                    artist-name="{{$song->artist_name}}"
                    album-name="{{$song->albumName}}"
                    user="{{$user->username}}"
                    song-i-d="{{$song->song_ID}}"
                />
            @endforeach
        </div>
    @else
        <p>No user found</p>
    @endif
</div>
