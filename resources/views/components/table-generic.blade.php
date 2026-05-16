@props([
    "route_prefix",
    "collection"
])
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <x-table class="border rounded-lg">

                    <x-table.head>
                        <x-table.th>Titulo</x-table.th>
                        <x-table.th>Imagem</x-table.th>
                        <x-table.th>Creado en</x-table.th>
                        <x-table.th>Acciones</x-table.th>
                    </x-table.head>

                    <x-table.body>
                        @foreach($collection as $instance)
                        <x-table.tr>

                                <x-table.td>
                                    <div class="flex items-center gap-2">
                                        <x-ui.visible-icon :visible="$instance->is_public" />
                                        {{ $instance->title }}
                                    </div>
                                </x-table.td>
                                <x-table.td>
                                    <img width="50" src="{{ asset('storage/' . $instance->image) }}" alt="">
                                </x-table.td>
                                <x-table.td>{{ $instance->created_at }}</x-table.td>
                                <x-table.td>
                                    <a href="{{ route($route_prefix . '.update', $instance->id) }}" class="text-blue-500">Editar</a>
                                </x-table.td>
                            </x-table.tr>
                        @endforeach
                    </x-table.body>
                </x-table>
            </div>
        </div>
    </div>
</div>