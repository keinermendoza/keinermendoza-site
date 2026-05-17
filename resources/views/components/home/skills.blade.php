<section id="skills">
  <x-section-wrapper>
    <x-ui.section-heading title="Minhas principais ferramentas" subtitle="Tech Stack" />

    <div class="skills-grid">
      @foreach ($skills as $skill)
        <div class="skill-card card">
          <div class="icon-box">
            <img src="{{ $skill->image_url }}" alt="{{ $skill->title }} Logo">
          </div>
          <h3 class="h3">{{$skill->title}}</h3>
          <p>{{$skill->description}}</p>
        </div>
      @endforeach
    </div>
  </x-section-wrapper>
</section>