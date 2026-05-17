@props([
    "title",
    "subtitle"
])

<div {{ $attributes->merge(['class' => 'heading']) }}>
    <span class="subtitle">{{$subtitle}}</span>
    <h2 class="h2">{{$title}}</h2>
</div>