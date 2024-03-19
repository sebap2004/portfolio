@props(['name', 'type' => 'text', 'error'])

<x-form.field>
    <div
        x-data="{ uploading: false, progress: 0, success: false }"
        x-on:livewire-upload-start="uploading = true"
        x-on:livewire-upload-finish="uploading = false; success = true"
        x-on:livewire-upload-cancel="uploading = false"
        x-on:livewire-upload-error="uploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress"
    >
    <x-form.label name="{{$name}}">{{$slot}}</x-form.label>

    <input type="file"
           name="{{$name}}"
           id="{{$name}}"
           {{ $attributes->merge(['class' => 'file-input']) }}
    />
    <x-form.error name="{{$error}}"/>
        <div x-show="uploading">
            <progress class="progress progress-accent" max="100" x-bind:value="progress"></progress>
            <button class="btn btn-sm btn-primary" type="button" wire:click="$cancelUpload('photo')">Cancel Upload</button>
        </div>
        <div x-show="success" class="text-success flex items-center my-3"><span class="material-symbols-outlined mr-3">
check_circle
</span>File uploaded successfully</div>
    </div>
</x-form.field>
