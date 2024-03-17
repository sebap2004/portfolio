<div class="flex flex-col items-center">
    <h1 class="text-3xl">Create a new album</h1>

    <form class="p-2" wire:submit="create" enctype="multipart/form-data">
        @csrf
        <x-form.input wire:model="form.album_name" class="w-96" name="album name" error="form.album_name"/>
        <x-form.fileinput wire:model="form.cover_directory" class="file-input-primary w-96" name="cover image file" error="form.cover_directory" type="file"><span class="text-gray-400 text-xs ml-1"><i>2MB File Limit, Square image preferred</i></span></x-form.fileinput>
        <x-form.dropdown wire:model="form.artist_ID" name="Artist" error="form.song_directory">
            <option selected disabled>Select an artist...</option>
            <option value="0"> None </option>
            @foreach(\App\Models\Artist::all() as $artist)
                <option value="{{ $artist->artist_ID }}">{{$artist->name}}</option>
            @endforeach
        </x-form.dropdown>
        @if ($form->cover_directory)
            <span class="text-gray-400 text-xs m-1"><i>Image Preview:</i></span>
            <img src="{{ $form->cover_directory->temporaryUrl() }}" class="mt-1 aspect-square rounded-xl shadow-xl shadow-accent" id="cover_image_preview" style="max-width: 125px;" alt="preview">
        @endif
        <button class="btn btn-primary mt-3">Upload</button>
    </form>
</div>
