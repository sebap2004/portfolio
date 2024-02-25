<nav class="navbar md:flex md:justify-between md:items-center p-3 m-0 bg-dark">
    <div>
        <a href="/">
            <img src="/images/logowithtext.png" alt="Laracasts Logo" width="165" height="16">
        </a>
    </div>

    <div class="mt-8 md:mt-0 flex items-center">
        <a wire:navigate href="/app" class="btn btn-primary btn-outline rounded-full mx-3" data-theme="light">
            Open Player
        </a>
        @guest
            <a wire:navigate href="/login" class="btn btn-primary btn-outline rounded-full mx-3" data-theme="light">
                Log In
            </a>
            <a wire:navigate href="/register" class="btn btn-primary mx-3">
                Register
            </a>
        @else
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost rounded-btn">Welcome back, {{auth()->user()->name}}<span class="material-symbols-outlined">
keyboard_arrow_down
</span></div>
                <ul tabindex="0" class="menu dropdown-content z-[1] p-2 shadow bg-base-100 rounded-box w-52 mt-4">
                    @admin
                    <li><a>Admin Panel</a></li>
                    @endadmin
                    <li><a href="/logout">Log Out</a></li>
                </ul>
            </div>
        @endguest


    </div>

</nav>
