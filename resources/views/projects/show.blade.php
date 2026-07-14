@php($links = [
    [
        "ref" => route('welcome'),
        "text" => "Pagina Principal"
    ],
    [
        "ref" => route('projects.index'),
        "text" => "Todos os Projetos"
    ],

])


<x-layout :image="$project->image->url()" :title="$project->title" url="{{ $project->get_absolute_url() }}" description="{{ $project->subtitle }}">
    <x-home.navigation :links="$links" />
    <section class="bg-gray-100 pt-10 ">
        <x-section-wrapper class="min-h-screen">
            <h1 class="h2 my-4">{{$project->title}}</h1>
            <div class="mb-4">
            @foreach ($project->tags as $tag)
                <x-ui.tag :isBlue="$loop->odd">{{ $tag->title}}</x-ui.tag>
            @endforeach
            </div>
            <hr>
            <div class="prose lg:prose-xl">
                {!! $project->content !!}
            </div>

        </x-section-wrapper>
    </section>
    <x-home.footer />

</x-layout>
