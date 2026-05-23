<x-dashboard-generic-resource title="Projetos" type="index" resource="projects">
    <x-table-generic 
        :collection="$projects"
        route_prefix="projects"
    />
</x-dashboard-generic-resource>