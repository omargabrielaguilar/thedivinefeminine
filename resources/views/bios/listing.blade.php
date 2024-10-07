<x-listing :title="$bio->nickname" :href="route('bios.show', $bio)">
    <x-slot name="actions">
        <a href="{{ route('bios.edit', $bio) }}" title="Edit">
            @svg('compose', 'inline w-5 fill-current')
        </a>
        <a href="{{ route('bios.delete', ['id' => $bio->id]) }}" class="ml-3" title="Delete">
            @svg('trash', 'inline w-5 fill-current')
        </a>
    </x-slot>
    <x-slot name="body">{{ $bio->nickname }}</x-slot>
</x-listing>
