<div class="adminSongTable" x-data="{
    songToDelete: null,
    showDelete(id) {
      this.songToDelete = id;
      $refs.modal.showModal();
    }
  }"
     @album-deleted="
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
                <th>Album Cover</th>
                <th>Album Name</th>
                <th>Artist</th>
                <th>Uploaded at</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($albums as $album)
                <!-- row 1 -->
                <tr wire:key="{{$album->album_ID}}">
                    <th>
                        {{$album->album_ID}}
                    </th>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-square w-12 h-12">
                                    <img src="{{Storage::url($album->cover_directory)}}" alt="Cover"/>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center gap-3">
                            <div>
                                <div class="font-bold">{{$album->album_name}}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="flex items-center gap-3">
                            <div>
                                <div class="font-bold">{{$album->artist->name}}</div>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{$album->created_at->toDayDateTimeString()}}
                    </td>
                    <th>
                        <button wire:click="editAlbum({{$album->album_ID}})" class="btn btn-primary btn-sm mr-3"><span
                                class="material-symbols-outlined">
edit
</span></button>
                        <button @click="showDelete({{ $album->album_ID }})" class="btn btn-error btn-sm mr-3">
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
                <th>Album Cover</th>
                <th>Album Name</th>
                <th>Artist</th>
                <th>Uploaded at</th>
                <th>Actions</th>
            </tr>
            </tfoot>
        </table>
        {{$albums->links()}}
    </div>
    <dialog wire:ignore x-ref="modal"
            @close="songToDelete = null" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Are you sure you want to delete this album?</h3>
            <p class="py-4"><span class="text-red-500">WARNING: </span>This deletes all songs within the album.</p>
            <div class="modal-action">
                <form method="dialog">
                    <button @click="$refs.modal.close()" class="btn">Cancel</button>
                    <button @click="$wire.deleteAlbum(songToDelete)" class="btn btn-error">Yes</button>
                </form>
            </div>
        </div>
    </dialog>

    <dialog wire:ignore x-ref="successModal" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Album deleted successfully.</h3>
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
            <h3 class="font-bold text-lg">Edit Album</h3>
            <form class="p-2" wire:submit="finishEdit" enctype="multipart/form-data">
                @csrf
                <x-form.input wire:model="form.album_name" class="w-96" name="album name" error="form.song_name"/>
                <x-form.dropdown wire:model="form.artist_ID" name="Artist" error="form.song_directory">
                    <option selected disabled>Select an artist...</option>
                    @foreach(\App\Models\Artist::all() as $artist)
                        <option value="{{ $artist->artist_ID }}">{{$artist->name}}</option>
                    @endforeach
                </x-form.dropdown>
                <x-form.fileinput wire:model="form.cover_directory" class="file-input-primary w-96"
                                  name="cover image file" error="form.cover_directory" type="file"><span
                        class="text-gray-400 text-xs ml-1"><i>15MB File Limit, Square image preferred</i></span>
                </x-form.fileinput>
                @if ($form->cover_directory)
                    <!-- Display existing cover image -->
                    <span class="text-gray-400 text-xs m-1"><i>Existing Cover Image:</i></span>
                    <img src="{{ Storage::url($form->cover_directory) }}"
                         class="mt-1 aspect-square rounded-xl shadow-xl shadow-accent" id="cover_image_preview"
                         style="max-width: 125px;" alt="preview">

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
