<div class="adminSongTable" x-data="{
    songToDelete: null,
    showDelete(id) {
      this.songToDelete = id;
      $refs.modal.showModal();
    }
  }"
     @playlist-deleted="
     $refs.modal.close();
     $refs.successModal.showModal();
     "
     @start-edit="$refs.editModal.showModal()"

     @edit-completed="$refs.editModal.close(); $refs.editSuccessModal.showModal();"
>
    <div class="overflow-x-auto">
        <div class="m-3 w-96">
            <label>
                <input wire:model.live.debounce.100="search" type="text" class="input w-full input-primary"
                       placeholder="Search for playlists...">
            </label>
        </div>
        <table class="table">
            <!-- head -->
            <thead>
            <tr>
                <th>Name</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($playlists)
                @foreach($playlists as $playlist)
                    <!-- row 1 -->
                    <tr wire:key="{{$playlist->album_ID}}">
                        <td>
                            <div class="flex items-center gap-3">
                                <div>
                                    <div class="font-bold">{{$playlist->playlist_name}}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{$playlist->created_at->diffForHumans()}}
                        </td>
                        <th>
                            <button wire:click="editplaylist({{$playlist->playlist_ID}})" class="btn btn-primary btn-sm mr-3"><span
                                    class="material-symbols-outlined">
edit
</span></button>
                            <button @click="showDelete({{ $playlist->playlist_ID }})" class="btn btn-error btn-sm mr-3">
    <span class="material-symbols-outlined">
        Delete
    </span>
                            </button>
                        </th>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <!-- foot -->
            <tfoot>
            <tr>
                <th>Name</th>
                <th>Created at</th>
                <th>Actions</th>
            </tr>
            </tfoot>
        </table>
        @if($playlists)
            {{$playlists->links()}}
        @endif
    </div>
    <dialog wire:ignore x-ref="modal"
            @close="songToDelete = null" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Are you sure you want to delete this playlist?</h3>
            <div class="modal-action">
                <form method="dialog">
                    <button @click="$refs.modal.close()" class="btn">Cancel</button>
                    <button @click="$wire.deletePlaylist(songToDelete)" class="btn btn-error">Yes</button>
                </form>
            </div>
        </div>
    </dialog>

    <dialog wire:ignore x-ref="successModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Playlist deleted successfully.</h3>
            <div class="modal-action">
                <form method="dialog">
                    <button @click="$refs.successModal.close()" class="btn">Ok</button>
                </form>
            </div>
        </div>
    </dialog>

    <dialog wire:ignore x-ref="editSuccessModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Album edited successfully.</h3>
            <div class="modal-action">
                <form method="dialog">
                    <button @click="$refs.editSuccessModal.close()" class="btn">Ok</button>
                </form>
            </div>
        </div>
    </dialog>

    <dialog wire:ignore x-ref="editModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Edit playlist</h3>
            <form class="p-2" wire:submit="finishEdit" enctype="multipart/form-data">
                @csrf
                <x-form.input wire:model="form.playlist_name" class="w-96" name="album name" error="form.song_name"/>
                <div class="modal-action">
                    <form method="dialog">
                        <button type="button" @click="$refs.editModal.close()" class="btn">Cancel</button>
                        <button type="submit" wire:click="finishEdit" class="btn">Edit</button>
                    </form>
                </div>
            </form>
        </div>
    </dialog>

    <dialog wire:ignore.self x-ref="editedUser" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Album edited successfully.</h3>
            <div class="modal-action">
                <form method="dialog">
                    <button @click="$refs.editedUser.close()" class="btn">Ok</button>
                </form>
            </div>
        </div>
    </dialog>

</div>


