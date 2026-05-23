<x-dashboard-generic-resource title="Tags" type="edit" resource="tags" :instance="$tag">

    <form method="POST" action="{{ $tag->get_update_url() }}" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <!-- title -->
        <div>
            <x-input-label for="title" value="title" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $tag->title)" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <!-- slug -->
        <div>
            <x-input-label for="slug" value="slug" />
            <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug', $tag->slug)" required />
            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
        </div>
        
        <!-- image -->
        <img class="w-full max-w-lg" src="{{ $tag->image_url }}" alt="imagem de projeto {{ $tag->title }}">
        <div class="mt-4">
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <!-- description -->
        <div class="mt-4">
            <x-input-label for="description" value="description" />
            <x-textarea id="description" class="block mt-1 w-full" type="description" name="description" :value="old('description', $tag->description)" />
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
                {{ old('is_public', $tag->is_public) ? 'checked' : '' }} 
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

</x-dashboard-generic-resource>