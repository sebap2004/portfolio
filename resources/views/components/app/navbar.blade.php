<nav class="navbar md:flex md:justify-between md:items-center p-3 m-0 bg-dark border-2 border-base-100 border-b-base-300">
    <div>
        <a href="/">
            <img src="/images/logoonly.png" alt="Laracasts Logo" width="80" height="16">
        </a>
    </div>
    <input type="text" placeholder="Search for anything..." class="input input-bordered input-primary w-108 " />
    <div class="ml-20"></div>
    <div class="mt-8 md:mt-0 flex items-center">
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost rounded-btn">{{auth()->user()->name}} <span class="material-symbols-outlined">
keyboard_arrow_down
</span></div>
            <ul tabindex="0" class="menu dropdown-content z-[1] p-2 bg-base-200 shadow rounded-box w-52 mt-4">
                @admin
                <li><a>Admin Panel</a></li>
                @endadmin
                <li><a href="">Settings</a></li>
                <li><a href="">View Profile</a></li>
                <li><a href="">Upload Song</a></li>
                <li><a href="/logout">Log Out</a></li>
            </ul>
        </div>
    </div>
</nav>
