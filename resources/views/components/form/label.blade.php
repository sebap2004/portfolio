@props(['name'])

<label class="label" for="full-name">
    <span class="label-text">{{ucwords($name)}} {{$slot}}</span>
</label>
