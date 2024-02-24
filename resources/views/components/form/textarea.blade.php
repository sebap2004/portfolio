@props(['name'])

<x-form.field>
    <x-form.label/>

    <x-form.textarea
            name="{{$name}}"
           id="{{$name}}"
           class="input input-bordered"
        {{$attributes}}
    />
    <x-form.error name="{{$name}}"/>
</x-form.field>
