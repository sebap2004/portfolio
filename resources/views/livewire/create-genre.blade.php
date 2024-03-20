<div class="w-108">
    <form class="card-body" wire:submit="create">
        <x-form.input wire:model="genre_name" name="Genre Name" placeholder="Genre" error="genre_name"/>
        <div class="form-control mt-6">
            <button class="btn btn-primary" type="submit">Create</button>
        </div>
    </form>
</div>
