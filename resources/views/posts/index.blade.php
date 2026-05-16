<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Posts
        </h2>
    </x-slot>

    <x-table-generic 
        :collection="$posts"
        route_prefix="posts"
    />
</x-app-layout>
