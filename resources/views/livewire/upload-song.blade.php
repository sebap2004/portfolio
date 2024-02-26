<div>
    <h1 class="text-3xl">Upload a new song</h1>

    <form class="p-2" wire:submit="create">
        <x-form.input wire:model="form.song_name" class="w-96" name="song name" error="form.songname"/>
        <x-form.input wire:model="form.albumName" class="w-96" name="album name" error="form.songname"/>
        <x-form.fileinput wire:model="form.song_directory" class="file-input-primary w-96" name="music file" error="form.songname" type="file"/>
        <x-form.fileinput wire:model="form.cover_directory" class="file-input-primary w-96" name="cover image file" error="form.songname" type="file"/>
        <button class="btn btn-primary mt-3">Upload</button>
    </form>
</div>

