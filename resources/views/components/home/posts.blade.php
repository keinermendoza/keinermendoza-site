<section id="blog">
  <x-section-wrapper>

    <!-- HEADER -->
    <x-ui.section-heading title="Ultimas postagens" subtitle="Blog" />

    <!-- GRID -->
    <div class="blog-grid">

      @foreach ($posts as $post)
        <x-home.blog-card :post="$post" />
      @endforeach
    </div>
  </x-section-wrapper>

</section>