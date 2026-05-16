<section>
    <h1>{{$post->title}}</h1>
    <img src="{{ asset('storage/' . $post->image); }}" alt="imagem de {{ $post->title }}">
    <x-ui.form-image endpoint="{{ route('posts.update', $post->id) }}" />

</section>