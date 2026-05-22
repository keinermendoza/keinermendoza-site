@props([
    "title",
    "index_url" => "",
    "edit_title" => "",
    "create_url" => "",
])

<x-app-layout>
    <x-slot name="header">
        <div class="text-gray-800 dark:text-gray-200">
            <h2 class="font-semibold mb-2 text-xl leading-tight">
                {{ $title }}
            </h2>
            <div class="flex gap-2 items-center">
                @if($index_url) 
                <a class=" underline underline-offset-4" href="{{ $index_url }}" >Ver todos</a>
                @else
                <span class="text-gray-600 dark:text-gray-400" >Ver todos</span>
                @endif

                @if($edit_title)
                <span>&gt;</span>
                <span class="text-gray-600 dark:text-gray-400">{{$edit_title}}</span>
                @endif
            </div>
        </div>
        @if($create_url) 
        <x-ui.link-primary href="{{ $create_url }}">Novo</x-ui.link-primary>
        @else 
        <x-ui.link-primary href="#">Novo</x-ui.link-primary>
        @endif
        
    </x-slot>

    {{ $slot }}
</x-app-layout>
