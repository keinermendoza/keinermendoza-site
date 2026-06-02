<x-dashboard-generic-resource title="Projetos" type="create" resource="projects">
    @section('left')
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

    <!-- content -->
    <div class="mt-4">
        <x-input-label for="content" value="content" />
        <x-textarea id="content" class="block mt-1 w-full" type="content" name="content" :value="old('content')" />
        <x-input-error :messages="$errors->get('content')" class="mt-2" />
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

    @endsection

    @section('right')
    <x-related-tags :tags="$tags" />
    @endsection

    <x-image-selector-modal :modalName="$modalName" inputId="image" imagePreviewId="image-preview" />

</x-dashboard-generic-resource>
