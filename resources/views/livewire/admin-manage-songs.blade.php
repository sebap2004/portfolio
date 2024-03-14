<div class="adminSongTable" x-data="{
    songToDelete: null,
    showDelete(id) {
      this.songToDelete = id;
      $refs.modal.showModal();
    }
  }"
     @song-deleted="
     $refs.modal.close();
     $refs.successModal.showModal();
     "
>
    <div class="overflow-x-auto">
        <div class="m-3 w-96">
            <label>
                <input wire:model.live.debounce.100="search" type="text" class="input w-full input-primary"
                       placeholder="Search for users...">
            </label>
        </div>
        <table class="table">
            <!-- head -->
            <thead>
            <tr>
                <th>ID</th>
                <th>Cover</th>
                <th>Song Name</th>
                <th>Artist</th>
                <th>Album</th>
                <th>Uploaded at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($songs as $song)
                <!-- row 1 -->
                <tr wire:key="{{$song->song_ID}}">
                    <th>
                        {{$song->song_ID}}
                    </th>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-square w-12 h-12">
                                    <img src="{{Storage::url($song->cover_directory)}}" alt="Cover"/>
                                </div>
                            </div>
                        </div>

                    </td>
                    <td>
                        <div class="flex items-center gap-3">
                            <div>
                                <div class="font-bold">{{$song->song_name}}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{$song->user->name}}
                    </td>
                    <td>
                        No album yet
                    </td>
                    <td>
                        {{$song->created_at->toDayDateTimeString()}}
                    </td>
                    <th>
                        <button class="btn btn-primary btn-sm mr-3"><span class="material-symbols-outlined">
edit
</span></button>
                        <button @click="showDelete({{ $song->song_ID }})" class="btn btn-error btn-sm mr-3">
    <span class="material-symbols-outlined">
        Delete
    </span>
                        </button>
                    </th>
                </tr>
            @endforeach
            </tbody>
            <!-- foot -->
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Cover</th>
                <th>Song Name</th>
                <th>Artist</th>
                <th>Album</th>
                <th>Uploaded at</th>
                <th>Actions</th>
            </tr>
            </tfoot>
        </table>
        {{$songs->links()}}
    </div>
    <dialog wire:ignore x-ref="modal"
            @close="songToDelete = null" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Are you sure you want to delete this song?</h3>
            <p class="py-4">This cannot be undone</p>
            <div class="modal-action">
                <form method="dialog">
                    <button @click="$refs.modal.close()" class="btn">Cancel</button>
                    <button @click="$wire.deleteSong(songToDelete)" class="btn btn-error">Yes</button>
                </form>
            </div>
        </div>
    </dialog>

    <dialog wire:ignore x-ref="successModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Song deleted successfully.</h3>
            <div class="modal-action">
                <form method="dialog">
                    <button @click="$refs.successModal.close()" class="btn">Ok</button>
                </form>
            </div>
        </div>
    </dialog>
</div>
