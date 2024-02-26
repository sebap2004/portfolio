@props(['name', 'type' => 'text', 'error'])

<x-form.field>
    <x-form.label name="{{$name}}"/>

    <input type="{{$type}}"
           name="{{$name}}"
           id="{{$name}}"
           {{ $attributes->merge(['class' => 'input input-bordered']) }}
    />
    <x-form.error name="{{$error}}"/>
</x-form.field>
