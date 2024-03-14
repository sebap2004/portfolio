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
     @start-edit="$refs.editModal.showModal()"

     @edit-completed="$refs.editModal.close(); $refs.editSuccessModal.showModal();"
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
                        {{$song->artist_name}}
                    </td>
                    <td>
                        No album yet
                    </td>
                    <td>
                        {{$song->created_at->toDayDateTimeString()}}
                    </td>
                    <th>
                        <button wire:click="editSong({{$song->song_ID}})" class="btn btn-primary btn-sm mr-3"><span class="material-symbols-outlined">
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

    <dialog wire:ignore x-ref="editSuccessModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Song edited successfully.</h3>
            <div class="modal-action">
                <form method="dialog">
                    <button @click="$refs.editSuccessModal.close()" class="btn">Ok</button>
                </form>
            </div>
        </div>
    </dialog>

    <dialog wire:ignore x-ref="editModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Edit song</h3>
            <form class="p-2" wire:submit="finishEdit" enctype="multipart/form-data">
                @csrf
                <x-form.input wire:model="form.song_name" class="w-96" name="song name" error="form.song_name"/>
                <x-form.input wire:model="form.artist_name" class="w-96" name="artist name" error="form.artist_name"/>
                <x-form.fileinput wire:model="form.song_directory" class="file-input-primary w-96" name="music file" error="form.song_directory" type="file"><span class="text-gray-400 text-xs ml-1"><i>2MB File Limit</i></span></x-form.fileinput>
                <x-form.fileinput wire:model="form.cover_directory" class="file-input-primary w-96" name="cover image file" error="form.cover_directory" type="file"><span class="text-gray-400 text-xs ml-1"><i>2MB File Limit, Square image preferred</i></span></x-form.fileinput>
                @if ($form->cover_directory)
                        <!-- Display existing cover image -->
                        <span class="text-gray-400 text-xs m-1"><i>Existing Cover Image:</i></span>
                        <img src="{{ Storage::url($form->cover_directory) }}" class="mt-1 aspect-square rounded-xl shadow-xl shadow-accent" id="cover_image_preview" style="max-width: 125px;" alt="preview">

                @endif

                <div class="modal-action">
                    <form method="dialog">
                        <button type="button" @click="$refs.editModal.close()" class="btn">Cancel</button>
                        <button type="submit" wire:click="finishEdit" class="btn">Edit</button>
                    </form>
                </div>
            </form>
        </div>
    </dialog>


</div>
