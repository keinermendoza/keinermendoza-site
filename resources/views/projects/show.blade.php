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
    <section class="bg-gray-100 pt-10">
        <x-section-wrapper class="min-h-screen">
            <h1 class="h2 mb-8">{{$project->title}}</h1>
            <img class="mb-8 object-cover max-h-[32rem] shadow-lg rounded-lg" src="{{ $project->image?->url() }}" alt="{{ $project->subtitle }}">
            <div>
            @foreach ($project->tags as $tag)
                <x-ui.tag>{{$tag->title}}</x-ui.tag>
            @endforeach
            </div>

            <div class="prose lg:prose-xl">
                {!! $project->content !!}
            </div>

        </x-section-wrapper>
    </section>
    <x-home.footer />

</x-layout>
