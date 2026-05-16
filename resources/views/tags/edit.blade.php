<section>
    <h1>{{$tag->title}}</h1>
    <img src="{{ asset('storage/' . $tag->image); }}" alt="imagem de {{ $tag->title }}">
    <x-ui.form-image endpoint="{{ route('tags.update', $tag->id) }}" />
</section>