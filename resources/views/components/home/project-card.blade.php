<article {{ $attributes->merge(["class" => "project-card"]) }}>
    <a href="{{ $project->get_absolute_url() }}">
        <img class="project-card-image" src="{{ $project->image?->url() }}" alt="{{ $project->subtitle }}">

        <div class="overlay">
            <h3 class="h3">{{ $project->title }}</h3>
            <p >{{ $project->subtitle }}</p>

            <div class="tags">
                @foreach ($project->tags as $tag)
                <x-ui.tag :isBlue="$loop->odd">{{ $tag->title}}</x-ui.tag>
                @endforeach
            </div>

        </div>
    </a>
</article>
