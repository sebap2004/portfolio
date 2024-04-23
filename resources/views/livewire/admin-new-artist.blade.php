<div class="shrink-0 w-108 max-w-full bg-base-100">
    <form wire:submit="register">
        <x-form.input wire:model="form.name" error="form.name" name="full name" placeholder="full name" needed/>
        <x-form.input wire:model="form.username" error="form.username" name="username" placeholder="username"
                      needed/>
        <x-form.fileinput wire:model="form.pfp_directory" class="file-input-primary w-full" name="Profile Picture"
                          error="form.pfp_directory" type="file"><span class="text-gray-400 text-xs ml-1"><i>15MB File Limit, Square image preferred</i></span>
        </x-form.fileinput>
        <x-form.textarea class="h-36" wire:model="form.bio" name="bio" error="form.bio" placeholder="bio"/>
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
            @if($photoStatus )
                <img src="{{ $url }}"
                     class="mt-1 aspect-square rounded-xl shadow-xl shadow-accent" id="cover_image_preview"
                     style="max-width: 125px;" alt="preview">
            @else
               <div class="mt-2 mr-2 flex items-center justify-center text-red-500"><span class="material-symbols-outlined m-1 text-red-500">
error
</span>Cannot preview file. Likely not an image file</div>
            @endif
        @endif
        <div class="form-control mt-6">
            <button class="btn btn-primary" type="submit">Register</button>
        </div>
    </form>
</div>
