@props(['name'])

<x-form.field>
    <x-form.label name="{{$name}}"/>

    <textarea
           name="{{$name}}"
           id="{{$name}}"
        {{ $attributes->merge(['class' => 'input input-bordered']) }}
    ></textarea>
    <x-form.error name="{{$name}}"/>
</x-form.field>
