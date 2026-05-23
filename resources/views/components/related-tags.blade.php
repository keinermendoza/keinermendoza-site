@props([
    "tags_title" => "Tags",
    "instance" => null,
    "tags",
])

<legend class="text-2xl font-semibold mb-2">{{ $tags_title }}</legend>
<ul>
@foreach($tags as $tag)
    <li class="mb-2">
        @if($instance)
        <input 
            type="checkbox" 
            name="tags[]"
            {{ $instance->tags->contains($tag->id)  ? 'checked' : '' }}
            value="{{ $tag->id }}" id="tag_{{ $tag->id }}" />
        @else
        <input 
            type="checkbox" 
            name="tags[]"
            value="{{ $tag->id }}" id="tag_{{ $tag->id }}" />
        @endif
        <label class="ms-1" for="tag_{{ $tag->id }}">
            {{ $tag->title }}
        </label>
    </li>
@endforeach
</ul>
