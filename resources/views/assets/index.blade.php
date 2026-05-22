<x-dashboard-generic title="Assets" index_url="{{ route('assets.index') }}" create_url="{{ route('assets.create') }}">
    <x-table-generic 
        :collection="$assets"
        route_prefix="assets"
    />
</x-dashboard-generic>