<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tags
        </h2>
        <x-ui.link-primary href="{{ route('tags.create') }}" >Novo</x-ui.link-primary >
    </x-slot>

    <x-table-generic 
        :collection="$tags"
        route_prefix="tags"
    />
</x-app-layout>
