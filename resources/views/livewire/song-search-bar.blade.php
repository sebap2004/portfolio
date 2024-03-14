<div>
    <form wire:submit.prevent="search" class="flex justify-center items-center">
        <input wire:model="searchQuery" type="text" placeholder="Search for songs, artists, albums..." name="search"
               class="input input-bordered rounded-full input-primary w-searchbar" />
        <button class="btn btn-ghost btn-circle ml-3">
            <span class="material-symbols-outlined">search</span>
        </button>
    </form>
</div>
