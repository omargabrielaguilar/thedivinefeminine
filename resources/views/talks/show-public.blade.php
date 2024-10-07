@extends('app')

@section('content')
    <x-panel>
        <x-button.primary
            :href="route('speakers-public.show', $user->profile_slug)"
            icon="arrow-thick-left"
            class="inline-block"
        >
            Return to profile for {{ $user->name }}
        </x-button.primary>

        <h2 class="mt-8 text-4xl">{{ $talk->currentRevision->title }}</h2>

        <p style="font-style: italic">
            {{ $talk->currentRevision->length }} minute {{ $talk->currentRevision->level }}
            {{ $talk->currentRevision->type }}
        </p>

        <h3 class="mt-8 text-3xl">Description/Proposal</h3>

        {!! markdown($talk->currentRevision->getDescription()) !!}
    </x-panel>
@endsection
