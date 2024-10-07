<x-listing :title="$talk->currentRevision->title" :href="route('talks.show', $talk)">
    <x-slot name="actions">
        <a href="{{ route('talks.edit', $talk) }}" title="Edit">
            @svg('compose', 'inline w-5 fill-current')
        </a>
        <a href="{{ route('talks.delete', ['id' => $talk->id]) }}" class="ml-3" title="Delete">
            @svg('trash', 'inline w-5 fill-current')
        </a>
        @if ($talk->isArchived())
            <a href="{{ route('talks.restore', ['id' => $talk->id]) }}" class="ml-3" title="Restore">
                @svg('folder-outline', 'inline w-5 fill-current')
            </a>
        @else
            <a href="{{ route('talks.archive', ['id' => $talk->id]) }}" class="ml-3" title="Archive">
                @svg('folder', 'inline w-5 fill-current')
            </a>
        @endif
    </x-slot>
    <x-slot name="footer">
        <div>
            <div class="text-gray-500">Created</div>
            <div>{{ $talk->created_at->toFormattedDateString() }}</div>
        </div>
        <div class="flex items-end">
            <div>
                {{ $talk->currentRevision->length }}-minute {{ $talk->currentRevision->level }}
                {{ $talk->currentRevision->type }}
            </div>
        </div>
    </x-slot>
</x-listing>
