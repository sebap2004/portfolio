<div>
<h1 class="text-3xl">Welcome back, {{auth()->user()->name}}!</h1>
    <div class="lg:grid lg:grid-cols-8 lg:grid-flow-row sm:grid-cols-1 sm:grid-flow-col gap-4">
        @foreach($songs as $song)
            <div class="shadow-lg col-span-2 p-2 rounded-2xl bg-base-200">
                <img class="w-full" src="{{ asset('storage/app/' . $song->cover_directory) }}" alt="{{$song->song_name}}">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{$song->song_name}}</div>
                    <p class="text-gray-700 text-base">
                        {{$song->artist_name}}
                    </p>
                    <p class="text-gray-700 text-base">
                        {{$song->albumName}}
                    </p>
                </div>
                <div class="px-6 py-4">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Tag1</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">#Tag2</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">#Tag3</span>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <button class="btn btn-primary mr-2">Play</button>
                    <button class="btn btn-secondary">Add to Playlist</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
