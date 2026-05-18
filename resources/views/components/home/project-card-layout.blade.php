@props([
    "title",
    "description" => "",
    "image" => "",
    "tags" => [],
])
<article {{ $attributes->merge(["class" => "project-card"]) }}>
    @if($image)
    <img class="image" src="{{ $image }}" alt="{{ $title }}">
    @endif
    <div class="overlay">
        @if($tags)
        <div class="tags">
            {{ $tags }}
        </div>
        @endif

        <h3 class="h3">{{ $title }}</h3>
        @if($description)
        <p>{{ $description }}</p>
        @endif
    </div>
</article>