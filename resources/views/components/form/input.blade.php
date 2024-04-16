@props(['name', 'type' => 'text', 'error', 'needed' => false])

<x-form.field>
    <x-form.label name="{{$name}}">{{$slot}} @if($needed)<span class="text-red-500">*</span>@endif</x-form.label>

    <input type="{{$type}}"
           name="{{$name}}"
           id="{{$name}}"
           {{ $attributes->merge(['class' => 'input input-bordered']) }}
    />
    @if(isset($error))
        <x-form.error name="{{$error}}"/>
    @endif
</x-form.field>
