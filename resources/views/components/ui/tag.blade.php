@props([
    "isBlue" => false
])
<span {{ $attributes->merge([
    'class' => $isBlue ? 'tag tag-blue' : 'tag tag-black'
]) }}>{{$slot}}</span>
