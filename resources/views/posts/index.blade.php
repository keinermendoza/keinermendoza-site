<x-dashboard-generic-resource title="Projetos" type="index" resource="posts">
    <x-table-generic 
        :collection="$posts"
        route_prefix="posts"
    />
</x-dashboard-generic-resource>