<x-dashboard-generic-resource title="Arquivos" type="index" resource="assets">

    {{-- <x-table-generic
        :collection="$assets"
        route_prefix="assets"
    /> --}}
    <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">

                <x-table class="border rounded-lg">

                    <x-table.head>
                        <x-table.th>Nome</x-table.th>
                        <x-table.th>Preview</x-table.th>
                        <x-table.th>Acciones</x-table.th>
                    </x-table.head>

                    <x-table.body>
                        @foreach($assets as $instance)
                        {{-- alpine variable for show delete form --}}
                        @php($flag_show_destroy = "open_" . "destroy_" . $instance->id)

                        <x-table.tr x-data="{{$flag_show_destroy}}: false }">

                                <x-table.td>
                                    <div class="flex items-center gap-2">
                                        <x-ui.visible-icon :visible="$instance->is_public" />
                                        {{ $instance->name }}
                                    </div>
                                </x-table.td>

                                <x-table.td>
                                    @if($instance->isImage())
                                        @if($instance->image_url)
                                        <img width="48" heigth="48" src="{{ $instance->image_url }}" alt="">
                                        @else
                                        <div class="w-12 h-12 rounded-md bg-gray-400"></div>
                                        @endif
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                    </svg>
                                    @endif
                                </x-table.td>

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
</x-dashboard-generic>
