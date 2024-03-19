<nav
    class="navbar row-span-1 col-span-7 justify-between md:items-center p-3 m-0 bg-dark border-2 border-base-100 border-b-base-300">
    <div class="w-20p">
        <a href="/app">
            <x-logo class="text-base-100"/>
        </a>
    </div>
    <div class="w-80p">
        <h1 class="text-3xl font-bold"><a href="/manage" wire:navigate>Manage</a></h1>
    </div>
    <div class="w-20p mt-8 md:mt-0 flex items-center justify-end">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost rounded-btn"><span><img
                        src="{{ auth()->user()->pfp_directory ? Storage::url(auth()->user()->pfp_directory) : "/images/defaultpfp.jpg" }}" class="w-10 rounded-full aspect-square"/></span> {{auth()->user()->name}}
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
