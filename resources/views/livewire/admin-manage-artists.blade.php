<div class="adminSongTable" @user-deleted="$refs.deletedUser.showModal()"
     @user-edited="$refs.editModal.close(); $refs.editedUser.showModal()">
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
                <th>Picture</th>
                <th>Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($artists as $artist)
                <!-- row 1 -->
                <tr wire:key="{{$artist->artist_ID}}">
                    <th>
                        {{$artist->artist_ID}}
                    </th>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-square w-12 h-12">
                                    <img src="{{Storage::url($artist->pfp_directory)}}" alt="Cover"/>
                                </div>
                            </div>
                        </div>

                    </td>
                    <td>
                        <div class="flex items-center gap-3">
                            <div>
                                <div class="font-bold link link-hover">
                                    <a href="/profile/{{$artist->username}}">{{$artist->name}}</a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{$artist->username}}
                    </td>
                    <th>
                        <button wire:click="artistSet({{$artist->artist_ID}})" onclick="editUser.showModal()"
                                class="btn btn-primary btn-sm mr-3"><span class="material-symbols-outlined">
edit
</span></button>
                        <button wire:click.prevent="setArtistToDelete({{ $artist->artist_ID }})" onclick="deleteUser.showModal()"
                                class="btn btn-error btn-sm mr-3">
    <span class="material-symbols-outlined">
        Delete
    </span>
                        </button>

                    </th>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Picture</th>
                <th>Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            </tfoot>
        </table>
        {{$artists->links()}}
    </div>

    <dialog wire:ignore.self id="deleteUser" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Are you sure you want to delete this user?</h3>
            <p class="py-4">This cannot be undone</p>
            <div class="modal-action">
                <form method="dialog">
                    <button onclick="deleteUser.close()" class="btn">Cancel</button>
                    <button onclick="deleteUser.close()" wire:click.prevent="deleteUser" class="btn btn-error"><span
                            class="material-symbols-outlined">
        Delete
    </span>YES!!!!
                    </button>
                </form>
            </div>
        </div>
    </dialog>

    <dialog wire:ignore.self x-ref="deletedUser" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">User deleted successfully.</h3>
            <p class="py-4">You monster.</p>
            <div class="modal-action">
                <form method="dialog">
                    <button @click="$refs.deletedUser.close()" class="btn">Ok</button>
                </form>
            </div>
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

    <dialog wire:ignore.self x-ref="editModal" id="editUser" class="modal">
        <div class="modal-box">
            <h1 class="text-3xl">Edit user:</h1>
            <form wire:submit="editArtist">
                <x-form.input wire:model="form.name" error="form.name" name="full name" placeholder="full name"/>
                <x-form.input wire:model="form.username" error="form.username" name="username" placeholder="username"/>
                <x-form.textarea class="h-36" wire:model="form.bio" name="bio" error="form.bio" placeholder="bio"/>
                <x-form.fileinput wire:model="form.pfp_directory" class="file-input-primary w-96" name="Profile Picture"
                                  error="form.pfp_directory" type="file"><span class="text-gray-400 text-xs ml-1"><i>15MB File Limit, Square image preferred</i></span>
                </x-form.fileinput>
                @if ($form->pfp_directory)
                    <span class="text-gray-400 text-xs m-1"><i>Image Preview:</i></span>
                    <img src="{{ $form->pfp_directory->temporaryUrl() }}"
                         class="mt-1 aspect-square rounded-xl shadow-xl shadow-accent" id="cover_image_preview"
                         style="max-width: 125px;" alt="preview">
                @endif
                <div class="modal-action">
                    <form method="dialog">
                        <button type="submit" class="btn btn-primary" wire:click="editArtist"><span
                                class="material-symbols-outlined">
edit
</span> Edit User
                        </button>
                        <button type="button" @click="$refs.editModal.close()" class="btn">Cancel</button>
                    </form>
                </div>
            </form>
        </div>
    </dialog>
</div>


