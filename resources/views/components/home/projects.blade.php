<section id="projects" class="projects-section">
    <x-section-wrapper>
        <section id="projects">
  <div class="container">

    <!-- HEADER -->
    <div class="header">
      <div class="title">
        <span>Showcase</span>
        <h2>Projetos em Destaque</h2>
      </div>

      <a href="#" class="link">
        Ver todos os projetos
        <span class="material-symbols-outlined">arrow_forward</span>
      </a>
    </div>

    <!-- GRID -->
    <div class="projects-grid">

      <!-- MAIN PROJECT -->
      <div class="project-main">
        <img class="image" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAgLl-9_w3Bv2kFngc_JP3wfe9Y8hytVHq1FFwlliskg250AxihqEfFFNg_aHQZbtSV5SbXnzRxi7iYkDlc-xWFquSSbd6tLCUHoRuJWV_I10scMOqqnLEOsq7-BTmwPiuVLTGCP_Ckz0znSyl4nbHBc-dpXDjI1TWha7wTn5F0zIcwrFTfSOJL61i0Qoz3QXjUzqikV9pSLkjY1_6JMh3vn0VhZlWgtojTtKQhfGdzMcTPcL06aW_rYn9aLBjMOv3uKjyWJvM0vcs" alt="Backend Project">

        <div class="overlay">
          <div class="tags">
            <span class="tag-secondary">Laravel</span>
            <span class="tag-light">MySQL</span>
          </div>

          <h3>Sistema de Gestão de Produção (SGDP)</h3>
          <p>
            Ferramenta migrada de Django para Laravel visando performance. 
            Implementação focada em models robustos e eficiência de dados.
          </p>
        </div>
      </div>

      <!-- SIDE -->
      <div class="projects-side">

        <div class="project-card">
          <span class="material-symbols-outlined icon">integration_instructions</span>

          <div>
            <h4>Migração Framework</h4>
            <p>Otimização de processos legados para arquiteturas modernas e escaláveis.</p>
          </div>
        </div>

        <div class="project-card project-cta">
          <span class="material-symbols-outlined icon">terminal</span>

          <div>
            <h4>Ver Código</h4>
            <p>Confira as soluções técnicas implementadas no meu GitHub.</p>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
        {{-- <h2 class="h2 title">Projetos</h2>
        
        <div class="projects__gallery">
            @foreach ($projects as $project)
            <article class="project-card">
                <p class="title">{{$project->title}}</p>
                <picture class="image">
                    <source srcset="{{ $project->image_url }}" media="(min-width: 480px)" />
                    <img src="{{ $project->image_url }}" alt={{$project->title}} />
                </picture>

                <div class="content">
                    {!! $project->content !!}
                </div>

                <footer class="tech-stack">
                    <h3 class="h3">tenologias</h3>
                    
                    <div class="tech-svgs">
                    @foreach ($project->tags as $tag)
                        <x-ui.tech-icon :text="$tag->description">
                            <img style="width:2.5rem; height:2.5rem;" :src="$tag->image" :alt="$tag->title">
                        </x-ui.tech-icon>    
                    @endforeach
                    </div>
                </footer>
            </article>
            @endforeach

        </div> --}}
    </x-section-wrapper>
</section>