<x-dashboard-generic title="Assets" index_url="{{ route('assets.index') }}" >

    <form method="POST" action="{{ route('assets.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- name -->
        <div>
            <x-input-label for="name" value="name" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- file -->
        <div class="mt-4">
            <x-text-input id="file" class="block mt-1 w-full" type="file" name="file"/>
            <x-input-error :messages="$errors->get('file')" class="mt-2" />
        </div>

       
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                Salvar
            </x-primary-button>
        </div>

        
    </form>

</x-dashboard-generic>