@props([
    "collection",
    "prefix" => ""
])
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <x-table class="border rounded-lg">

                    <x-table.head>
                        <x-table.th>Titulo</x-table.th>
                        <x-table.th>Imagem</x-table.th>
                        <x-table.th>Atualizado em</x-table.th>
                        <x-table.th>Acciones</x-table.th>
                    </x-table.head>

                    <x-table.body>
                        @foreach($collection as $instance)
                        {{-- alpine variable for show delete form --}}
                        @php($flag_show_destroy = "open_" . "destroy_" . $prefix ."_" . $instance->id)
                        
                        <x-table.tr x-data="{ {{$flag_show_destroy}}: false }">

                                <x-table.td>
                                    <div class="flex items-center gap-2">
                                        <x-ui.visible-icon :visible="$instance->is_public" />
                                        {{ $instance->title }}
                                    </div>
                                </x-table.td>
                                <x-table.td>
                                    <img width="50" src="{{ $instance->image_url }}" alt="">
                                </x-table.td>
                                <x-table.td>{{ $instance->updated_at }}</x-table.td>
                                <x-table.td>
                                    <div class="flex h-full items-center gap-4">

                                        <a href="{{ $instance->get_edit_url() }}" class="text-blue-500">Editar</a>

                                        <button @click="{{ $flag_show_destroy }} = true" class="text-red-500">Deletar</button>
                                        
                                        <template x-teleport="body">
                                            <div x-show="{{ $flag_show_destroy }}" class="fixed inset-0 bg-black/50 flex items-center justify-center">
                                                <form class="bg-white p-4 rounded" method="POST" action="{{ $instance->get_destroy_url() }}">

                                                    @csrf
                                                    @method("DELETE")
                                                    <p>¿Estás seguro?</p>

                                                    <button type="button" @click="{{ $flag_show_destroy }} = false">Cancelar</button>

                                                    <button type="submit" class="text-red-500">
                                                        Confirmar
                                                    </button>
                                                </form>
                                            </div>
                                        </template>
                                    </div>
                                    
                                </x-table.td>
                            </x-table.tr>
                        @endforeach
                    </x-table.body>
                </x-table>
            </div>
        </div>
    </div>
</div>