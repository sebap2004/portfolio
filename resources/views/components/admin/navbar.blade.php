<nav
    class="navbar row-span-1 col-span-7 justify-between md:items-center p-3 m-0 bg-dark border-2 border-base-100 border-b-base-300">
    <div class="w-20p">
        <a href="/app" wire:navigate>
            <img src="/images/logoonly.png" alt="Laracasts Logo" width="80" height="16">
        </a>
    </div>
    <div class="w-80p">
        <h1 class="text-3xl font-bold"><a href="/admin" wire:navigate>Admin panel</a></h1>
    </div>
    <div class="w-20p mt-8 md:mt-0 flex items-center justify-end">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost rounded-btn"><span><img
                        src="{{Storage::url(auth()->user()->pfp_directory)}} " class="w-10 rounded-full aspect-square"/></span> {{auth()->user()->name}}
                @admin
                <span class="badge badge-accent">Admin</span>
                @endadmin
                <span class="material-symbols-outlined">
keyboard_arrow_down
</span>
            </div>
            <ul tabindex="0" class="menu dropdown-content z-[100] p-2 bg-base-200 shadow rounded-box w-52 mt-4">
                @admin
                <li><a href="/admin">Admin Panel</a></li>
                @endadmin
                <li><a href="/profile/{{auth()->user()->username}}" wire:navigate>View Profile</a></li>
                <li><a href="" wire:navigate>Settings</a></li>
                <li><a href="/logout" class="text-red-500">Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>
