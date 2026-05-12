<section id="projects" class="projects">
    <x-section-wrapper>
        <h2 class="h2 title">Projetos</h2>
        
        <div class="projects__gallery">
            @foreach ($projects as $project)
            <p>um</p>
            <x-project-card-grid 
                :title="$project->title"
                :image="$project->image"
                >
                {{-- :video_id="project.video" --}}

                <x-slot name="summary">
                    <p>{!! $project->content !!}</p>
                </x-slot>

                <x-slot name="procces">
                    <p>{!! $project->content !!}</p>
                </x-slot>

                <x-slot name="tech_stack">
                {{-- @foreach ()
                    <c-ui.tech-icon :text="tech.description">
                        <img style="width:2.5rem; height:2.5rem;" src="{{tech.image.url}}" alt="{{tech.name}} {% trans 'icon' %}">
                    </c-ui.tech-icon>    
                @endforeach --}}
                </x-slot>
            </x-project-card-grid>    
            @endforeach

        </div>
    </x-section-wrapper>
</section>