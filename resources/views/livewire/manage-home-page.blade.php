<div class="pt-3">
    <h1 class="text-3xl text-center">What will you get up to?</h1>
    <div class="flex flex-row w-full">
        <div>
            <x-settings.bigbutton
                link="profile/{{auth()->user()->username}}/edit"
                title="Edit Profile"
                subtitle="Change profile settings"
            />
            <x-settings.bigbutton
                link="/manage/playlists"
                title="Manage Playlists"
                subtitle="Manage playlists you have created"
            />
        </div>
        <div>
            <x-settings.bigbutton
                link="/manage/albums"
                title="Manage albums"
                subtitle="Manage albums you have created"
            />
            <x-settings.bigbutton
                link="/manage/songs"
                title="Manage Songs"
                subtitle="Manage songs you have created"
            />
        </div>
    </div>
    <x-backbutton/>
</div>
