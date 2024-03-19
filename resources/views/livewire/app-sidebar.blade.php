<div class="row-span-7"
     x-data="{ currentSong: 0 }"
     @playlist-created="$refs.playlistModal.close();"
     @start-set-playlist.window="$refs.addToPlaylist.showModal(); currentSong = $event.detail;"
     @added-song="$refs.addToPlaylist.close()">
    <x-app.sidebar>
        <div class="dropdown">
            <div tabindex="0" role="button" class="btn btn-sm btn-circle btn-primary"><span
                    class="material-symbols-outlined">
add
</span></div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-300 rounded-box w-52">
                <li><a href="/app/upload" wire:navigate>New Song</a></li>
                <li><a @click="$refs.playlistModal.showModal()">New Playlist</a></li>
                <li><a href="/app/createalbum" wire:navigate>New Album</a></li>
            </ul>
        </div>
        <h1 class="text-2xl pb-1">Playlists</h1>
        <hr class="mb-3">
        <div class="overflow-y-auto h-full">
            @foreach($playlists as $playlist)
                <a class="btn btn-block mt-1 bg-base-300 text-left"
                   href="/playlist/{{$playlist->playlist_slug}}"
                   wire:navigate
                >{{$playlist->playlist_name}}</a>
            @endforeach
        </div>
    </x-app.sidebar>
    <dialog x-ref="playlistModal" wire:ignore.self class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Create new playlist</h3>
            <form wire:submit.prevent="createPlaylist">
                <x-form.input wire:model="playlist_name"
                    name="Playlist Name"
                    error="playlistName"
                />
                <div class="modal-action">
                    <button type="button" @click.prevent="$refs.playlistModal.close()" class="btn">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </dialog>
    <dialog x-ref="addToPlaylist" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg mb-3">Choose playlist to add to</h3>
            <div class="overflow-y-auto max-h-96">
                @foreach($playlists as $playlist)
                    <a class="btn btn-block mt-1 bg-base-300 text-left"
                       @click="$wire.addSongToPlaylist({{$playlist->playlist_ID}} , currentSong);">{{$playlist->playlist_name}}</a>
                @endforeach
            </div>
            <div class="modal-action">
                <form>
                    <button type="button" @click.prevent="$refs.addToPlaylist.close();" class="btn">Close</button>
                </form>
            </div>
        </div>
    </dialog>
</div>

