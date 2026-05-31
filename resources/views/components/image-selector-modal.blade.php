@props([
    "modalName",
    "inputId",
    "imagePreviewId" => ""
])

<x-modal :name="$modalName" >
    <div data-input="{{ $inputId }}" data-imagepreview="{{ $imagePreviewId }}" data-getendpoint="{{ route('images.index') }}" data-postendpoint="{{ route('images.store') }}" id="customModal" class="p-4 text-gray-700 dark:text-white">
        <h3 class="text-2xl text-center font-semibold mb-3">Selecione a imeagen</h3>
        <details>
        <summary>Subir outro arquivo</summary>

            <form id="custom-modal-form" method="POST" action="{{ route('assets.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- name -->
                <div>
                    <x-input-label for="name" value="name" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" required />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- file -->
                <div class="mt-4">
                    <x-text-input id="file" class="block mt-1 w-full" type="file" name="file" required />
                    <x-input-error :messages="$errors->get('file')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-4">
                        Salvar
                    </x-primary-button>
                </div>

            </form>
        </details>

        <div id="custom-modal-gallery" class="grid grid-cols-4 gap-2" ></div>

    </div>
</x-modal>
