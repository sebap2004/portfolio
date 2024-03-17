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
            <img src="{{ $form->pfp_directory->temporaryUrl() }}"
                 class="mt-1 aspect-square rounded-xl shadow-xl shadow-accent" id="cover_image_preview"
                 style="max-width: 125px;" alt="preview">
        @endif
        <div class="form-control mt-6">
            <button class="btn btn-primary" type="submit">Register</button>
        </div>
    </form>
</div>
