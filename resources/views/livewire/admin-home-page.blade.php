<div class="pt-3">
    @php
        $hour = date('H');
        $greeting = '';
        if ($hour >= 5 && $hour < 12) {
            $greeting = 'Good morning';
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = 'Good afternoon';
        } else {
            $greeting = 'Good evening';
        }
    @endphp
    <h1 class="text-3xl text-center">{{$greeting}}, {{auth()->user()->name}}.</h1>
    <div class="flex flex-row w-full">
        <div>
            <x-settings.bigbutton
                link="/admin/uploadsong"
                title="Upload Song"
                subtitle="Upload a song with admin access"
            />
            <x-settings.bigbutton
                link="/admin/managesongs"
                title="Manage Songs"
                subtitle="Manage all songs on the platform"
            />
        </div>
        <div>
            <x-settings.bigbutton
                link="/admin/newalbum"
                title="Create New Album"
                subtitle="Upload a song with admin access"
            />
            <x-settings.bigbutton
                link="/admin/manageusers"
                title="Manage Users"
                subtitle="Manage all users on the platform"
            />
            <x-settings.bigbutton
                link="/admin/manageartists"
                title="Manage Artists"
                subtitle="Manage all artists on the platform"
            />
        </div>
        <div>
            <x-settings.bigbutton
                link="/admin/managealbums"
                title="Manage Albums"
                subtitle="Manage all albums on the platform"
            />
            <x-settings.bigbutton
                link="/admin/newartist"
                title="Create new artist"
                subtitle="Create an artist to upload songs from"
            />
        </div>
    </div>
</div>
