<article class="blog-card">
    <div class="image-wrapper">
        <img src="{{ $post->image_url }}" alt="Blog Post 2">
    </div>

    <span class="meta">{{ $post->updated_at }}</span>

    <h3 class="title">{{ $post->title }}</h3>

    <p>
        {{ $post->description }}
    </p>

    <a href="#" class="read-more">
        Ler Mais
        <span class="material-symbols-outlined">arrow_outward</span>
    </a>
</article>
