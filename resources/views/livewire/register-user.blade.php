<div class="flex flex-col px-10 justify-center content-center">
    <div class="flex justify-center">
        <h1 class="text-4xl">Register</h1>
    </div>
    <div class="card shrink-0 w-108 max-w-full shadow-xl bg-base-100">
        <form class="card-body" wire:submit="register">
            <x-form.input wire:model="form.name" error="form.name" name="full name" placeholder="full name" needed/>
            <x-form.input wire:model="form.username" error="form.username" name="username" placeholder="username" needed/>
            <x-form.fileinput wire:model="form.pfp_directory" class="file-input-primary w-96" name="Profile Picture" error="form.pfp_directory" type="file"><span class="text-gray-400 text-xs ml-1"><i>2MB File Limit, Square image preferred</i></span></x-form.fileinput>
            @if ($form->pfp_directory)
                <span class="text-gray-400 text-xs m-1"><i>Image Preview:</i></span>
                <img src="{{ $form->pfp_directory->temporaryUrl() }}" class="mt-1 aspect-square rounded-xl shadow-xl shadow-accent" id="cover_image_preview" style="max-width: 125px;" alt="preview">
            @endif
            <x-form.input wire:model="form.email" error="form.email" name="email" type="email" placeholder="email" needed/>
            <x-form.input wire:model="form.password" error="form.password" name="password" type="password" placeholder="password" needed/>
            <div class="flex items-center">
                I agree to the <a class="link link-primary ml-1">terms of service.</a>
                <input class="checkbox checkbox-accent bg-base-100 m-3" wire:model="form.agreesToTOS"  type="checkbox">
            </div>
            <x-form.error name="form.agreesToTOS"/>
            <div class="form-control mt-6">
                <button class="btn btn-primary" type="submit">Register</button>
            </div>
        </form>
    </div>
</div>
