<section class="skills" id="habilidades">
  <x-section-wrapper>
    <x-ui.section-heading title="Minhas principais ferramentas" subtitle="Habilidades" />

    <div class="skills-grid">
      @foreach ($skills as $skill)
        <div class="skill-card card">
          <div class="icon-box">
            {!! $skill->svg !!}
          </div>
          <h3 class="h3">{{$skill->title}}</h3>
          <p>{{$skill->description}}</p>
        </div>
      @endforeach
    </div>
  </x-section-wrapper>
</section>
