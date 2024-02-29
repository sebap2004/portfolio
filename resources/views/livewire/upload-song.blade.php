<div class="flex flex-col items-center">
    <h1 class="text-3xl">Upload a new song</h1>

    <form class="p-2" wire:submit="create" enctype="multipart/form-data">
        @csrf
        <x-form.input wire:model="form.song_name" class="w-96" name="song name" error="form.song_name"/>
        <x-form.input wire:model="form.albumName" class="w-96" name="album name" error="form.albumName"/>
        <x-form.fileinput wire:model="form.song_directory" class="file-input-primary w-96" name="music file" error="form.song_directory" type="file"><span class="text-gray-400 text-xs ml-1"><i>2MB File Limit</i></span></x-form.fileinput>
        <x-form.fileinput wire:model="form.cover_directory" class="file-input-primary w-96" name="cover image file" error="form.cover_directory" type="file"><span class="text-gray-400 text-xs ml-1"><i>2MB File Limit, Square image preferred</i></span></x-form.fileinput>
        @if ($form->cover_directory)
            <span class="text-gray-400 text-xs m-1"><i>Image Preview:</i></span>
            <img src="{{ $form->cover_directory->temporaryUrl() }}" class="mt-1 aspect-square rounded-xl shadow-xl shadow-accent" id="cover_image_preview" style="max-width: 125px;" alt="preview">
        @endif
        <button class="btn btn-primary mt-3">Upload</button>
    </form>
</div>
