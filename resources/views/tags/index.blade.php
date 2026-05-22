<x-dashboard-generic title="Tags" create_url="{{ route('tags.create') }}">
    <x-table-generic 
        :collection="$tags"
        route_prefix="tags"
    />
</x-dashboard-generic>