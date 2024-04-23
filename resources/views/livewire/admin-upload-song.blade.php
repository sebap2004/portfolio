<div class="flex flex-col items-center">
    <h1 class="text-3xl">Upload a new song</h1>

    <form class="p-2" wire:submit="create" enctype="multipart/form-data">
        @csrf
        <x-form.input wire:model="form.song_name" class="w-96" name="song name" error="form.song_name"/>
        <x-form.dropdown wire:model="form.album_ID" name="Album" error="form.song_directory">
            <option selected disabled>Select an album...</option>
            <option value="0"> None </option>
            @foreach(\App\Models\Album::all() as $album)
                <option value="{{ $album->album_ID }}">{{ $album->album_name }} - {{$album->artist->name}}</option>
            @endforeach
        </x-form.dropdown>
        <x-form.dropdown wire:model="form.artist_ID" name="Artist">
            <option selected disabled>Select an artist...</option>
            <option value="0"> None </option>
            @foreach(\App\Models\Artist::all() as $artist)
                <option value="{{ $artist->artist_ID }}">{{$artist->name}}</option>
            @endforeach
        </x-form.dropdown>
        <x-form.dropdown wire:model="form.genre_ID" name="Genre" error="form.genre_ID">
            <option selected disabled>Select a genre...</option>
            <option value="0"> None </option>
            @foreach(\App\Models\Genre::all() as $genre)
                <option value="{{ $genre->genre_ID }}">{{$genre->genre_name}}</option>
            @endforeach
        </x-form.dropdown>
        <x-form.fileinput wire:model="form.song_directory" class="file-input-primary w-96" name="music file" error="form.song_directory" type="file"><span class="text-gray-400 text-xs ml-1"><i>100MB File Limit</i></span></x-form.fileinput>
        <x-form.fileinput wire:model="form.cover_directory" class="file-input-primary w-96" name="cover image file" error="form.cover_directory" type="file"><span class="text-gray-400 text-xs ml-1"><i>15MB File Limit, Square image preferred</i></span></x-form.fileinput>
        @if ($form->pfp_directory)
            <span class="text-gray-400 text-xs m-1"><i>Image Preview:</i></span>
            @php
                try {
                   $url = $form->pfp_directory->temporaryUrl();
                   $photoStatus = true;
                }catch (\Livewire\Features\SupportFileUploads\FileNotPreviewableException $exception){
                    $this->photoStatus =  false;
                }
            @endphp
            @if(isset($photoStatus) && $photoStatus)
                <img src="{{ $url }}"
                     class="mt-1 aspect-square rounded-xl shadow-xl shadow-accent" id="cover_image_preview"
                     style="max-width: 125px;" alt="preview">
            @else
                Something went wrong while uploading the file.
            @endif
        @endif
        <button class="btn btn-primary mt-3">Upload</button>
    </form>
</div>

