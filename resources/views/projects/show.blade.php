@php($links = [
    [
        "ref" => route('welcome'),
        "text" => "Pagina Principal"
    ],
    [
        "ref" => route('dashboard'),
        "text" => "Todos os Projetos"
    ],

])


<x-layout>
    <x-home.navigation :links="$links" />
    <section class="bg-blue-200 pt-10">
        <x-section-wrapper class="min-h-screen">
            <h1 class="h2 mb-8">{{$project->name}}</h1>

            <div>
            @foreach ($project->tags as $tag)
                <x-ui.tag>{{$tag->title}}</x-ui.tag>
            @endforeach
            </div>

            <div class="project-content">
                {!! $project->content !!}
            </div>

        </x-section-wrapper>
    </section>
    <x-home.footer />

</x-layout>
