<div class="pt-3">
    <h1 class="text-3xl">What shall you get up to, master?</h1>
    <div class="flex flex-row w-full">
        <div>
            <div class="m-2  w-96 h-96 relative">
                <a class="btn btn-block h-full flex flex-col justify-between">
                    <div class="absolute bottom-0 right-0 m-3 p-2 rounded-lg shadow-md flex flex-row-reverse">
                        <div>
                            <h2 class="text-2xl mb-4 font-semibold">Upload song</h2>
                            <p class="text-gray-600">Upload song with admin privileges</p>
                        </div>

                    </div>
                </a>
            </div>
            <div class="m-2  w-96 h-96 relative">
                <a class="btn btn-block h-full flex flex-col justify-between" href="/admin/managesongs" wire:navigate>
                    <div class="absolute bottom-0 right-0 m-3 p-2 rounded-lg shadow-md flex flex-row-reverse">
                        <div>
                            <h2 class="text-2xl mb-4 font-semibold">Manage Songs</h2>
                            <p class="text-gray-600">Manage all songs on the platform</p>
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
                            <h2 class="text-2xl mb-4 font-semibold">Create new album</h2>
                            <p class="text-gray-600">Create album with admin privileges</p>
                        </div>

                    </div>
                </a>
            </div>
            <div class="m-2 w-96 h-96 relative">
                <a class="btn btn-block h-full flex flex-col justify-between" href="/admin/manageusers" wire:navigate>
                    <div class="absolute bottom-0 right-0 m-3 p-2 rounded-lg shadow-md flex flex-row-reverse">
                        <div>
                            <h2 class="text-2xl mb-4 font-semibold">Manage Users</h2>
                            <p class="text-gray-600">Manage all users on the platform</p>
                        </div>

                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
