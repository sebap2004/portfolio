<nav class="navbar md:flex md:justify-between md:items-center p-3 m-0 bg-dark bg-dark border-2 border-base-100 border-b-base-300">
    <div>
        <a href="/">
            <img src="/images/logowithtext.png" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>

    <div class="mt-8 md:mt-0 flex items-center">
        @guest
            <a wire:navigate href="/login" class="btn btn-primary btn-outline rounded-full mx-3" data-theme="light">
                Log In
            </a>
            <a wire:navigate href="/register" class="btn btn-primary mx-3">
                Register
            </a>
        @else
            <a wire:navigate href="/app" class="btn btn-primary btn-outline rounded-full mx-3" data-theme="light">
                Open Player
            </a>
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost rounded-btn"><span><img src="{{Storage::url(auth()->user()->pfp_directory)}} " class="w-10 rounded-full aspect-square"/></span>Welcome back, {{auth()->user()->name}}<span class="material-symbols-outlined">
keyboard_arrow_down
</span></div>
                <ul tabindex="0" class="menu dropdown-content z-[1] p-2 shadow bg-base-300 rounded-box w-52 mt-4">
                    @admin
                    <li><a>Admin Panel</a></li>
                    @endadmin
                    <li><a href="/logout" class="text-red-500">Log Out</a></li>
                </ul>
            </div>
        @endguest


    </div>

</nav>
