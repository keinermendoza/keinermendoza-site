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
        "ref" => "#projetos-destacados",
        "text" => "Projetos  Destacados"
    ],
    [
        "ref" => "#contato",
        "text" => "Contato"
    ],

])

<x-layout>
    <x-home.navigation :links="$links" />
    <x-home.hero />
    <x-home.about />
    <x-home.skills :skills="$skills" />
    <x-home.projects :projects="$projects" />
    <x-home.contact />
    <x-home.footer />
</x-layout>
