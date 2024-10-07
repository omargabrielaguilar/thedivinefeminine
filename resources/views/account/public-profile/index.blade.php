@extends('app', ['title' => 'Speaker Profiles'])

@section('content')
    <x-panel>
        <p class="mb-4">These are all the speakers who have a public profile on Symposium.</p>

        <update-query-string>
            <div slot-scope="{ updateQueryString, clearQueryString, queryValue }" class="flex">
                <x-input.text
                    name="query"
                    label="Query"
                    placeholder="Name or Location"
                    :hideLabel="true"
                    :inline="true"
                    v-model="queryValue"
                    @keyup.enter="updateQueryString('query', queryValue)"
                ></x-input.text>
                <x-button.primary class="ml-2" @click="updateQueryString('query', queryValue)">Search</x-button.primary>
                <x-button.secondary class="ml-2" @click="clearQueryString('query')">Reset</x-button.secondary>
            </div>
        </update-query-string>

        <p class="mb-8 text-gray-500">
            @if (isset($query) && $query)
                <small>
                    Showing search results for
                    <em>{{ $query }}</em>
                    :
                </small>
            @else
                <small>Search by name or location</small>
            @endif
        </p>

        <div class="space-y-4">
            @forelse ($speakers as $speaker)
                <h3 class="text-2xl leading-4 text-indigo-800 hover:text-indigo-500 hover:underline">
                    <a href="{{ route('speakers-public.show', $speaker->profile_slug) }}">
                        {{ $speaker->name }}
                    </a>
                </h3>
                <small class="@if (!$speaker->location) invisible @endif text-gray-500">
                    {{ $speaker->location ?: '-' }}
                </small>
            @empty
                @if (isset($query) && $query)
                    <p class="text-info">No speakers match your search criteria.</p>
                @else
                    <p class="text-info">No speakers have made their profiles public yet.</p>
                @endif
            @endforelse
        </div>
    </x-panel>
@endsection
