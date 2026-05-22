<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Posts
        </h2>
        <x-ui.link-primary href="{{ route('posts.create') }}" >Novo</x-ui.link-primary >

    </x-slot>

    <x-table-generic :collection="$posts" prefix="posts"/>
</x-app-layout>
