@props([
    "modalName",
    "defaultImage" => "",
    "imagePreviewId" => "image-preview"
])

<div class="flex gap-4 items-center">
    <img
    @if ($defaultImage)
        src="{{ $defaultImage }}"
    @endif
    id="{{ $imagePreviewId }}"  class="w-20 h-20 bg-gray-300 rounded-md object-contain" src="" alt="">
    <x-primary-button
        class="mb-3"
        type="button"
        x-data
        x-on:click="$dispatch('open-modal', '{{ $modalName }}')">
        Selecionar Imagen
    </x-primary-button>
</div>
