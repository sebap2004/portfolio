<nav
    class="navbar row-span-1 col-span-7 justify-between md:items-center p-3 m-0 bg-dark border-2 border-base-100 border-b-base-300">
    <div class="w-20p">
        <a href="/app" wire:navigate>
            <img src="/images/logoonly.png" alt="Laracasts Logo" width="80" height="16">
        </a>
    </div>
    <div class="w-60p flex justify-center items-center">
    <livewire:song-search-bar/>
    </div>
    <div class="w-20p flex justify-end p-0">
        <div class="dropdown dropdown-end p-0">
            <div tabindex="0" role="button" class="btn btn-ghost rounded-btn"><span><img
                        src="{{Storage::url(auth()->user()->pfp_directory)}}" class="w-10 rounded-full aspect-square"/></span> {{auth()->user()->name}}
                @admin
                <span class="badge badge-accent">Admin</span>
                @endadmin
                <span class="material-symbols-outlined">
keyboard_arrow_down
</span>
            </div>
            <ul tabindex="0" class="menu dropdown-content z-[100] p-2 bg-base-200 shadow rounded-box w-52 mt-4">
                @admin
                <li><a href="/admin"> <span class="material-symbols-outlined">
admin_panel_settings
</span>Admin Panel</a></li>
                @endadmin
                <li><a href="/profile/{{auth()->user()->username}}" wire:navigate>
                        <span class="material-symbols-outlined">
account_circle
</span>View Profile</a></li>
                <li><a href="/manage" wire:navigate><span class="material-symbols-outlined">
settings
</span>Manage</a></li>
                <li><a href="/logout" class="text-red-500"><span class="material-symbols-outlined">
logout
</span>Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>
