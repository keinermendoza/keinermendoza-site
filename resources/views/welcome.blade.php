@php($links = [
    [
        "ref" => "#sobre-mim",
        "text" => "Sobre Mim"
    ],
    [
        "ref" => "#habilidades",
        "text" => "Habilidades"
    ],
    [
        "ref" => "#projetos",
        "text" => "Projetos"
    ],
    [
        "ref" => "#postagens",
        "text" => "Postagens"
    ],
])

<x-layout>
    <x-home.navigation :links="$links" />
    <x-home.hero />
    <x-home.about />
    <x-home.skills :skills="$skills" />
    <x-home.projects :projects="$projects" />
    <x-home.footer />
</x-layout>
