<section class="blog" id="postagens">
  <x-section-wrapper>

    <!-- HEADER -->
    <x-ui.section-heading title="Ultimas postagens" subtitle="Postagens" />

    <!-- GRID -->
    <div class="blog-grid">

      @foreach ($posts as $post)
        <x-home.blog-card :post="$post" />
      @endforeach
    </div>
  </x-section-wrapper>

</section>
