<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Projetos') }}
        </h2>
        <x-ui.link-primary href="{{ route('projects.create') }}" >Novo</x-ui.link-primary >

    </x-slot>

    <x-table-generic :collection="$projects"/>
</x-app-layout>
