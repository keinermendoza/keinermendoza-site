<x-dashboard-generic-resource title="Postagens" type="edit" resource="posts" :instance="$post">
    @section("left")
    <!-- title -->
    <div>
        <x-input-label for="title" value="title" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $post->title)" required autofocus />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <!-- slug -->
    <div>
        <x-input-label for="slug" value="slug" />
        <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug', $post->slug)" required />
        <x-input-error :messages="$errors->get('slug')" class="mt-2" />
    </div>
    
    <!-- image -->
    <img class="w-full max-w-lg" src="{{ $post->image_url }}" alt="imagem de projeto {{ $post->title }}">
    <div class="mt-4">
        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" />
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    <!-- content -->
    <div class="mt-4">
        <x-input-label for="content" value="content" />
        <x-textarea id="content" class="block mt-1 w-full" type="content" name="content" :value="old('content', $post->content)" />
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
            {{ old('is_public', $post->is_public) ? 'checked' : '' }} 
            class="w-4 h-4 border border-default-medium rounded-xs bg-neutral-secondary-medium focus:ring-2 focus:ring-brand-soft">
            <x-input-label for="is_public" value="Mostrar no site" />
        </div>
        <x-input-error :messages="$errors->get('is_public')" class="mt-2" />
    </div>
    @endsection

    @section("right")
    <x-related-tags :tags="$tags" :instance="$post" />
    @endsection

</x-app-layout>


