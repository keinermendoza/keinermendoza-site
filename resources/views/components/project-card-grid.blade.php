<div class="project-card-grid">

    <p class="project__title--mobile">{{$title}}</p>
        <picture class="project-card-grid__image">
            <source srcset="{{ $image }}" media="(min-width: 480px)" />
            <img src="{{ $image }}" alt={{$title}} />
      </picture>
    <div class="project-card-grid__summary-section">
        <h3 class="h3 project__title--desktop">{{$title}}</h3>
        <div class="summary">
            {{$summary}}
        </div>
    </div>

    <div class="project-card-grid__procces-section">
        <div class="procces">
            <h3 class="h3" >Processo</h3>
            {{$procces}}
        </div>
        <div class="tech-stack">
            <h3 class="h3">tenologias</h3>
            <div class="tech-svgs">
                {{$tech_stack}}
            </div>
        </div>
    </div>
</div>