@props(['name', 'type' => 'text'])

<x-form.field>
    <x-form.label name="{{$name}}"/>

    <input type="{{$type}}"
           name="{{$name}}"
           id="{{$name}}"
           class="input input-bordered"
        {{$attributes}}
    />
    <x-form.error name="{{$name}}"/>
</x-form.field>
