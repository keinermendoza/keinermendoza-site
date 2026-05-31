<x-dashboard-generic-resource title="Arquivos" type="edit" resource="assets" :instance="$asset" avoidForm>

    <form method="POST" action="{{ $asset->get_update_url() }}" enctype="multipart/form-data">
        @csrf
        @method("PUT")

        <!-- title -->
        <div>
            <x-input-label for="name" value="name" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $asset->name)" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- file -->
        @if($asset->isImage())
        <img class="my-4 w-full max-w-lg" src="{{ $asset->image_url }}" alt="filem de projeto {{ $asset->title }}">
        @endif

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                Salvar
            </x-primary-button>
        </div>

    </form>

</x-dashboard-generic-resource>
