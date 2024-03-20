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
                       placeholder="Search for genres...">
            </label>
        </div>
        <table class="table">
            <!-- head -->
            <thead>
            <tr>
                <th>ID</th>
                <th>Genre Name</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($genres)
                @foreach($genres as $genre)
                    <!-- row 1 -->
                    <tr wire:key="{{$genre->genre_ID}}">
                        <th>
                            {{$genre->genre_ID}}
                        </th>
                        <td>
                            {{$genre->genre_name}}
                        </td>
                        <th>
                            <button wire:click="setGenre({{$genre->genre_ID}})" @click="$dispatch('start-edit')" class="btn btn-primary btn-sm mr-3"><span class="material-symbols-outlined">
edit
</span></button>
                            <button @click="showDelete({{ $genre->genre_ID}})" wire:click="setGenre({{$genre->genre_ID}})" class="btn btn-error btn-sm mr-3">
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
                <th>ID</th>
                <th>Genre Name</th>
                <th>Actions</th>

            </tr>
            </tfoot>
        </table>
    </div>
    <dialog wire:ignore x-ref="modal"
            @close="songToDelete = null" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Are you sure you want to delete this song?</h3>
            <p class="py-4">This cannot be undone</p>
            <div class="modal-action">
                <form method="dialog">
                    <button @click="$refs.modal.close()" class="btn">Cancel</button>
                    <button @click="$wire.deleteGenre()" class="btn btn-error">Yes</button>
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
            <h3 class="font-bold text-lg">Genre edited successfully.</h3>
            <div class="modal-action">
                <form method="dialog">
                    <button @click="$refs.editSuccessModal.close()" class="btn">Ok</button>
                </form>
            </div>
        </div>
    </dialog>

    <dialog wire:ignore x-ref="editModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Edit Genre</h3>
            <form class="p-2" wire:submit="editGenre" enctype="multipart/form-data">
                @csrf
                <x-form.input wire:model="newName" class="w-96" name="Genre name" error="form.song_name"/>
                <div class="modal-action">
                    <form method="dialog">
                        <button type="button" @click="$refs.editModal.close()" class="btn">Cancel</button>
                        <button type="submit" wire:click="editGenre" class="btn">Edit</button>
                    </form>
                </div>
            </form>
        </div>
    </dialog>

    <dialog wire:ignore.self x-ref="editedUser" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">User edited successfully.</h3>
            <div class="modal-action">
                <form method="dialog">
                    <button @click="$refs.editedUser.close()" class="btn">Ok</button>
                </form>
            </div>
        </div>
    </dialog>

</div>
