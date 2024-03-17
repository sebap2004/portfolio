<div class="pt-3">
    <h1 class="text-3xl text-center">What will you get up to?</h1>
    <div class="flex flex-row w-full">
        <div>
            <div class="m-2  w-96 h-96 relative">
                <a href="profile/{{auth()->user()->username}}/edit" class="btn btn-block h-full flex flex-col justify-between">
                    <div class="absolute bottom-0 right-0 m-3 p-2 rounded-lg shadow-md flex flex-row-reverse">
                        <div>
                            <h2 class="text-2xl mb-4 font-semibold">Edit Profile</h2>
                            <p class="text-gray-600">Change profile settings</p>
                        </div>

                    </div>
                </a>
            </div>
            <div class="m-2  w-96 h-96 relative">
                <a class="btn btn-block h-full flex flex-col justify-between" href="/admin/managesongs" wire:navigate>
                    <div class="absolute bottom-0 right-0 m-3 p-2 rounded-lg shadow-md flex flex-row-reverse">
                        <div>
                            <h2 class="text-2xl mb-4 font-semibold">Manage Playlists</h2>
                            <p class="text-gray-600">Manage playlists you have created</p>
                        </div>

                    </div>
                </a>
            </div>
        </div>
        <div>
            <div class="m-2 w-96 h-96 relative">
                <a class="btn btn-block h-full flex flex-col justify-between">
                    <div class="absolute bottom-0 right-0 m-3 p-2 rounded-lg shadow-md flex flex-row-reverse">
                        <div>
                            <h2 class="text-2xl mb-4 font-semibold">Manage albums</h2>
                            <p class="text-gray-600">Manage albums you have created</p>
                        </div>

                    </div>
                </a>
            </div>
            <div class="m-2 w-96 h-96 relative">
                <a class="btn btn-block h-full flex flex-col justify-between" href="/admin/manageusers" wire:navigate>
                    <div class="absolute bottom-0 right-0 m-3 p-2 rounded-lg shadow-md flex flex-row-reverse">
                        <div>
                            <h2 class="text-2xl mb-4 font-semibold">Manage Songs</h2>
                            <p class="text-gray-600">Manage songs you have created</p>
                        </div>

                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
