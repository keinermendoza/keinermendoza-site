@php($links = [
    [
        "ref" => route('welcome'),
        "text" => "Pagina Principal"
    ],
])


<x-layout>
    <x-home.navigation :links="$links" />
    <section class="bg-gray-100 pt-10">
        <x-section-wrapper class="min-h-screen">
            <h1 class="h2 mt-4 mb-8">Projetos</h1>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach ($projects as $project)
                    <x-home.project-card :project="$project" class="max-h-80" />
                @endforeach
            </div>
        </x-section-wrapper>
    </section>
    <x-home.contact />
    <x-home.footer />

</x-layout>
