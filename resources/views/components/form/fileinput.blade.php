@props(['name', 'type' => 'text', 'error'])

<x-form.field>
    <x-form.label name="{{$name}}">{{$slot}}</x-form.label>

    <input type="file"
           name="{{$name}}"
           id="{{$name}}"
           {{ $attributes->merge(['class' => 'file-input']) }}
    />
    <x-form.error name="{{$error}}"/>
</x-form.field>
