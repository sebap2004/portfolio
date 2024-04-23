<div class="flex flex-col px-10 items-center justify-center content-center">
    <div class="flex justify-center">
        <h1 class="text-4xl">Edit profile</h1>
   </div>
    <div class="shrink-0 w-108 max-w-full bg-base-100">
        <form class="card-body" wire:submit="edit">
            <x-form.input wire:model="form.name" error="form.name" name="full name" placeholder="full name"/>
            <x-form.input wire:model="form.username" error="form.username" name="username" placeholder="username"/>
            <x-form.textarea class="h-36" wire:model="form.bio" name="bio" error="form.bio" placeholder="bio"/>
            <x-form.fileinput wire:model="form.pfp_directory" class="file-input-primary w-96" name="Profile Picture" error="form.pfp_directory" type="file"><span class="text-gray-400 text-xs ml-1"><i>15MB File Limit, Square image preferred</i></span></x-form.fileinput>
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
            <x-form.input wire:model="form.email" error="form.email" name="email" type="email" placeholder="email"/>
            <x-form.input wire:model="form.password" error="form.password" name="password" type="password" placeholder="password"/>
            <div class="form-control mt-6">
                <button class="btn btn-primary" type="submit">Edit</button>
            </div>
        </form>
    </div>
</div>
