<x-layout>
    <x-home.navigation />
    <x-home.hero />
    <x-home.about />
    <x-home.skills :skills="$tags" />
    <x-home.projects :projects="$projects" />
    <x-home.posts :posts="$posts" />
    <x-home.footer />
</x-layout>   