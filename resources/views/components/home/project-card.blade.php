@props([
    "isBlue" => false,
    "project"
])

<x-home.project-card-layout
    :image="$project->image_url"
    :title="$project->title"
    {{ $attributes }}
    >
    <x-slot name="tags">
    @foreach ($project->tags as $tag)
        <x-ui.tag :isBlue="$loop->even">{{ $tag->title}}</x-ui.tag>
    @endforeach
    </x-slot>

    <x-slot name="description">
        {{ $project->description }}
    </x-slot>
</x-home.project-card-layout>
