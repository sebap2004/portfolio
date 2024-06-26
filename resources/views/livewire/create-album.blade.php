<div class="flex flex-col items-center">
    <h1 class="text-3xl">Create a new album</h1>

    <form class="p-2" wire:submit="create" enctype="multipart/form-data">
        @csrf
        <x-form.input wire:model="form.album_name" class="w-96" name="album name" error="form.album_name"/>
        <x-form.fileinput wire:model="form.cover_directory" class="file-input-primary w-96" name="cover image file" error="form.cover_directory" type="file"><span class="text-gray-400 text-xs ml-1"><i>15MB File Limit, Square image preferred</i></span></x-form.fileinput>
        @if (isset($form->cover_directory) && $form->cover_directory)
            <span class="text-gray-400 text-xs m-1"><i>Image Preview:</i></span>
            @php
                try {
                   $url = $form->cover_directory->temporaryUrl();
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
               <div class="mt-2 mr-2 flex items-center justify-center text-red-500"><span class="material-symbols-outlined m-1 text-red-500">
error
</span>Cannot preview file. Likely not an image file</div>
            @endif
        @endif
        <button class="btn btn-primary mt-3">Upload</button>
    </form>
</div>
