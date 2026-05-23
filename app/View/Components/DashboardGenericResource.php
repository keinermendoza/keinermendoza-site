<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use stdClass;

class DashboardGenericResource extends Component
{
    private $availableTypes = [
        "index",
        "edit",
        "create"
    ];

    public string $title;
    public string $type;
    public string $index_url;
    public string $create_url;
    public string $store_url;
    public ?string $edit_title = null;
    public ?string $edit_url = null;
    public ?stdClass $instance = null;
    
    /**
     * Create a new component instance.
     */
    public function __construct(string $resource, string $type, string $title, $instance = null)
    {
        $this->title = $title;
        $this->type = $type;
        $this->index_url = route($resource . ".index");
        $this->create_url = route($resource . ".create");
        $this->store_url = route($resource . ".store");

        if(!in_array($type, $this->availableTypes)) {
            throw new \Exception("you need to specify the 'type': 'index', 'edit', 'create'");
        }
        
        if($type === "edit" && $instance === null){
            throw new \Exception("'edit' type requires you to provide an instance");
        }

        if($type === "edit") {
            $this->edit_url = $instance->get_edit_url();
            $this->edit_title = $instance->title ?? $instance->name;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard-resource');
    }
}
