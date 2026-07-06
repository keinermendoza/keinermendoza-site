<section id="projetos-destacados" class="projects">
  <x-section-wrapper>

    <div class="projects-header">
      <x-ui.section-heading title="Projetos em Destaque" subtitle="Projetos" />
      <a href="{{ route('projects.index') }}" class="link">
        Ver todos os projetos
      </a>
    </div>

    <!-- GRID -->
    <div class="projects-grid">

      <!-- MAIN PROJECT -->
      @php($firstProject = $projects->get(0))

      @if($firstProject)
      <x-home.project-card class="project-main" :project="$firstProject" />
      @else
      <x-home.empty-project-card class="project-main" />
      @endif

      <!-- SIDE -->
      <div class="projects-side">

        @php($secondProject = $projects->get(1))
        @if($secondProject)
          <x-home.project-card :project="$secondProject" />
        @else
        <x-home.empty-project-card />
        @endif

        @php($thirdProject = $projects->get(2))
        @if($thirdProject)
            <x-home.project-card :project="$thirdProject" />
        @else
            <x-home.empty-project-card />
        @endif

      </div>
    </div>

  </x-section-wrapper>
</section>
