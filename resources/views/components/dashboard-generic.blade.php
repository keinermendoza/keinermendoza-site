@props([
    "prefix",
    "is_create" => false,
    "instance" => null
])

<x-app-layout>
    <x-slot name="header">
        <div class="text-gray-800 dark:text-gray-200">
            <h2 class="font-semibold mb-2 text-xl leading-tight">
                {{ Str::title($prefix) }}
            </h2>
            <div class="flex gap-2 items-center">
                <a class="underline underline-offset-4" href="{{ route($prefix . 'index') }}" >Ver todos</a>
                @if($instance)
                <span>&gt;</span>
                <span class="text-gray-600 dark:text-gray-400">{{$instance->title}}</span>
                @endif
            </div>
        </div>
        <x-ui.link-primary
            @if($is_create) 
            href="#"
            @else 
            href="{{ route($prefix . 'create') }}"
            @endif
        >Novo</x-ui.link-primary>
    </x-slot>

    {{ $slot }}
</x-app-layout>
