<div class="adminSongTable" @user-deleted="$refs.deletedUser.showModal()" @user-edited="$refs.editModal.close(); $refs.editedUser.showModal()">
    <div class="overflow-x-auto">
        <div class="m-3 w-96">
            <label>
                <input wire:model.live.debounce.100="search" type="text" class="input w-full input-primary" placeholder="Search for users...">
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
                <th>Email</th>
                <th>Join Date</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <!-- row 1 -->
                <tr wire:key="{{$user->id}}">
                    <th>
                        {{$user->id}}
                    </th>
                    <td>
                        <div class="flex items-center gap-3">
                            <div class="avatar">
                                <div class="mask mask-square w-12 h-12">
                                    <img src="{{ $user->pfp_directory ? Storage::url($user->pfp_directory) : "/images/defaultpfp.jpg" }}" alt="Cover" />
                                </div>
                            </div>
                        </div>

                    </td>
                    <td>
                        <div class="flex items-center gap-3">
                            <div>
                                <div class="font-bold link link-hover">
                                    <a href="/profile/{{$user->username}}">{{$user->name}}</a>
                                    @if($user->id === auth()->user()->id)
                                        <span class="badge badge-success ml-3">You</span>
                                    @endif
                                    @if($user->admin())
                                        <span class="badge badge-accent ml-3">Admin</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{$user->username}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        {{$user->created_at->toDayDateTimeString()}}
                    </td>
                    <th>
                        @if($user->id === auth()->user()->id)
                            <a href="/{{"profile/" . auth()->user()->username . "/edit"}}" class="btn btn-primary btn-sm mr-3">Edit Profile</a>
                        @else
                            <button wire:click="userSet({{$user->id}})" onclick="editUser.showModal()" class="btn btn-primary btn-sm mr-3"><span class="material-symbols-outlined">
edit
</span></button>
                            <button wire:click.prevent="setUserToDelete({{ $user->id }})" onclick="deleteUser.showModal()" class="btn btn-error btn-sm mr-3">
    <span class="material-symbols-outlined">
        Delete
    </span>
                            </button>
                        @endif
                    </th>
                </tr>
            @endforeach
            </tbody>
            <!-- foot -->
            <tfoot>
            <tr>
                <th>ID</th>
                <th>Picture</th>
                <th>Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Join Date</th>
                <th>Actions</th>
            </tr>
            </tfoot>
        </table>
        {{$users->links()}}
    </div>

    <dialog wire:ignore.self id="deleteUser" class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Are you sure you want to delete this user?</h3>
            <p class="py-4">This cannot be undone</p>
            <div class="modal-action">
                <form method="dialog">
                    <button onclick="deleteUser.close()" class="btn">Cancel</button>
                    <button onclick="deleteUser.close()" wire:click.prevent="deleteUser" class="btn btn-error"><span class="material-symbols-outlined">
        Delete
    </span>YES!!!!</button>
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
            <form wire:submit="editUser">
                <x-form.input wire:model="form.name" error="form.name" name="full name" placeholder="full name"/>
                <x-form.input wire:model="form.username" error="form.username" name="username" placeholder="username"/>
                <x-form.textarea class="h-36" wire:model="form.bio" name="bio" error="form.bio" placeholder="bio"/>
                <x-form.fileinput wire:model="form.pfp_directory" class="file-input-primary w-96" name="Profile Picture" error="form.pfp_directory" type="file"><span class="text-gray-400 text-xs ml-1"><i>15MB File Limit, Square image preferred</i></span></x-form.fileinput>
                @if ($form->pfp_directory)
                    <span class="text-gray-400 text-xs m-1"><i>Image Preview:</i></span>
                    @php
                        try {
                           $url = $form->pfp_directory->temporaryUrl();
                           $photoStatus = true;
                        } catch (\Livewire\Features\SupportFileUploads\FileNotPreviewableException $exception){
                            $this->photoStatus =  false;
                        }
                    @endphp
                    @if(isset($photoStatus) && $photoStatus)
                        <img src="{{ $url }}"
                             class="mt-1 aspect-square rounded-xl shadow-xl shadow-accent" id="cover_image_preview"
                             style="max-width: 125px;" alt="preview">
                    @else
                        Something went wrong while uploading the file.
                    @endif
                @endif
                <x-form.input wire:model="form.email" error="form.email" name="email" type="email" placeholder="email"/>
                <x-form.input wire:model="form.password" error="form.password" name="password" type="password" placeholder="password"/>
                <div class="modal-action">
                    <form method="dialog">
                        <button type="submit"  class="btn btn-primary" wire:click="editUser"><span class="material-symbols-outlined">
edit
</span> Edit User</button>
                        <button type="button" @click="$refs.editModal.close()" class="btn">Cancel</button>
                    </form>
                </div>
            </form>
        </div>
    </dialog>
</div>

