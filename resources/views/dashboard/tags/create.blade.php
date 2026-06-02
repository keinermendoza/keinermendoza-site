<x-dashboard-generic-resource title="Tags" type="create" resource="tags">
<form method="POST" action="{{ route('tags.store') }}" enctype="multipart/form-data">
    @csrf

    <!-- title -->
    <div>
        <x-input-label for="title" value="title" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <!-- slug -->
    <div>
        <x-input-label for="slug" value="slug" />
        <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required />
        <x-input-error :messages="$errors->get('slug')" class="mt-2" />
    </div>

    <!-- image -->
    <div class="mt-4">
        <x-input-label for="" value="image" />

        <x-input-error :messages="$errors->get('image')" class="mt-2" />

        @php($modalName = "image-gallery")
        <x-open-image-modal :modalName="$modalName" />

        {{-- campo com url image oculto --}}
        <x-text-input type="hidden" id="image" class="block mt-1 w-full" name="image"/>

    </div>

    <!-- description -->
    <div class="mt-4">
        <x-input-label for="description" value="description" />
        <x-textarea id="description" class="block mt-1 w-full" type="description" name="description" :value="old('description')" />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>

    <!-- is_public -->
    <div class="mt-4">
        <div class="flex items-center gap-2">
            <input
            id="is_public"
            name="is_public"
            type="checkbox"
            value="1"
            {{ old('is_public') ? 'checked' : '' }}
            class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
            <x-input-label for="is_public" value="Mostrar no site" />
        </div>
        <x-input-error :messages="$errors->get('is_public')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ms-4">
            Salvar
        </x-primary-button>
    </div>


    </form>

    <script>
        const titleInput = document.getElementById("title");
        const slugInput = document.getElementById("slug");

        function generateSlug(text) {
            return text
                .toLowerCase()
                .trim()
                // reemplaza acentos
                .normalize("NFD").replace(/[\u0300-\u036f]/g, "")
                // reemplaza cualquier cosa que no sea a-z o 0-9 por "-"
                .replace(/[^a-z0-9]+/g, "-")
                // elimina guiones al inicio y final
                .replace(/^-+|-+$/g, "")
                // evita múltiples guiones consecutivos (aunque tu regex los permite)
                .replace(/-+/g, "-");
        }

        titleInput.oninput = () => {
            console.log(titleInput.value)
            slugInput.value = generateSlug(titleInput.value);
        }
    </script>

    <x-image-selector-modal :modalName="$modalName" inputId="image" imagePreviewId="image-preview" />

</x-dashboard-generic-resource>
