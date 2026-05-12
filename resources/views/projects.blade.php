<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projetos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <x-stat />
                        <x-stat />
                        <x-stat />
                    </div>


                    <x-table class="border rounded-lg">
    
                        <x-table.head>
                            <x-table.th>Titulo</x-table.th>
                            <x-table.th>Creado en</x-table.th>
                            <x-table.th>Acciones</x-table.th>
                        </x-table.head>

                        <x-table.body>
                            @foreach($projects as $project)
                                <x-table.tr>
                                    <x-table.td>
                                        <div class="flex items-center gap-2">
                                            <x-ui.visible-icon :visible="$project->is_public" />
                                            {{ $project->title }}
                                        </div>
                                    </x-table.td>
                                    <x-table.td>{{ $project->created_at }}</x-table.td>
                                    <x-table.td>
                                        <button class="text-blue-500">Editar</button>
                                    </x-table.td>
                                </x-table.tr>
                            @endforeach
                        </x-table.body>

                    </x-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
