@props(['link', 'title', 'subtitle'])

<div class="m-2 w-96 h-56 relative">
    <a class="btn btn-block h-full flex flex-col justify-between" href="{{$link}}" wire:navigate>
        <div class="absolute bottom-0 right-0 m-3 p-2 rounded-lg shadow-md flex flex-row-reverse">
            <div>
                <h2 class="text-2xl mb-4 font-semibold">{{$title}}</h2>
                <p class="text-gray-600">{{$subtitle}}</p>
            </div>

        </div>
    </a>
</div>
