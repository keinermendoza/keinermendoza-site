<x-app-layout>
    <x-slot name="header">
        <div class="text-gray-800 dark:text-gray-200">
            <h2 class="font-semibold mb-2 text-xl leading-tight">
                {{ $title }}
            </h2>
            <div class="flex gap-2 items-center">
                @if($type === "create" || $type === "edit" )
                <a class=" underline underline-offset-4" href="{{ $index_url }}" >Ver todos</a>
                @else
                <span class="text-gray-600 dark:text-gray-400" >Ver todos</span>
                @endif

                @if($type === "edit")
                <span>&gt;</span>
                <span class="text-gray-600 dark:text-gray-400">{{$edit_title}}</span>
                @endif
            </div>
        </div>
        @if($type === "index" || $type === "edit")
        <x-ui.link-primary href="{{ $create_url }}">Novo</x-ui.link-primary>
        @else
        <x-ui.link-primary href="#">Novo</x-ui.link-primary>
        @endif

    </x-slot>

    @unless($avoidForm)
        @if($type === "edit")
        <form method="POST" action="{{ $edit_url }}" enctype="multipart/form-data">
            @csrf
            @method("PUT")

        @elseif($type === "create")
        <form method="POST" action="{{ $store_url }}" enctype="multipart/form-data">
            @csrf
        @endif

            <div class="flex flex-col md:flex-row gap-4 text-gray-800 dark:text-gray-200 leading-tight">
                <div class="flex-grow">
                    @yield('left')
                </div>
                <fieldset class="min-w-80">
                    @yield('right')
                </fieldset>
            </div>

        @if($type === "create" || $type === "edit")

            <div class="flex items-center mt-4">
                <x-primary-button >
                    Salvar
                </x-primary-button>
            </div>

        </form>
        @endif
    @endunless

    {{ $slot }}

    {{-- slug automcomplete --}}
    <script>
        const titleInput = document.getElementById("title");
        const slugInput = document.getElementById("slug");
        if (titleInput && slugInput) {
            function generateSlug(text) {
                return text
                    .toLowerCase()
                    .trim()
                    // reemplaza acentos
                    .normalize("NFD").replace(/[\u0300-\u036f]/g, "")
                    // reemplaza qualquier cosa que no sea a-z o 0-9 por "-"
                    .replace(/[^a-z0-9]+/g, "-")
                    // elimina guiones al inicio y final
                    .replace(/^-+|-+$/g, "")
                    // evita múltiples guiones consecutivos
                    .replace(/-+/g, "-");
            }

            titleInput.oninput = () => {
                console.log(titleInput.value)
                slugInput.value = generateSlug(titleInput.value);
            }
        }
    </script>
    @stack("scripts")

</x-app-layout>
