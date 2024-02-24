@props(['name'])

@error('name')
<p class="alert-error">{{$message}}</p>
@enderror
