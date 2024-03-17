@props(['name', 'type' => 'text', 'error', 'needed' => false])

<x-form.field>
    <x-form.label name="{{$name}}"> @if($needed)<span class="text-red-500">*</span>@endif</x-form.label>

    <select type="{{$type}}"
           name="{{$name}}"
           id="{{$name}}"
        {{ $attributes->merge(['class' => 'input input-bordered']) }}
    >
        {{$slot}}
    </select>
    <x-form.error name="{{$error}}"/>
</x-form.field>
