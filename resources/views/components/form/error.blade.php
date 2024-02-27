@props(['name'])

@error($name)
<div class="mt-2 mr-2 flex items-center justify-center text-red-500"><span class="material-symbols-outlined m-1 text-red-500">
error
</span>{{$message}}</div>
@enderror
