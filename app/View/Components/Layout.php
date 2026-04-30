<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
 

    public string $canonicalURL;
    public string $socialImageURL;
 
    /**
     * Create a new component instance.
     */
    public function __construct(
        string $image = '',
        string $url = '',
        public string $title = "Keiner Mendoza",
        public string $description = "Tenho experiência na criação de múltiplos sites, o que me permitiu desenvolver habilidades práticas em tecnologias como PHP, Python, SQL, Git e JavaScript, além do uso de ferramentas de design como Figma. Estou em constante aprendizado, buscando aprimorar minhas competências e construir soluções eficientes e bem estruturadas."
    )
    {
        $this->socialImageURL = $image ? asset($image): asset('images/preview.jpg');
        $this->canonicalURL = $url ? url($url) : config('app.url');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout');
    }
}
