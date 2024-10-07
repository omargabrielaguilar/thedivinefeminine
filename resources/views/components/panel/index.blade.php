@props([
    'size' => 'lg',
    'padding' => true,
    'title',
])

@php
    $styles = [
        'sm' => 'p-0',
        'md' => 'p-0',
        'lg' => 'mx-auto max-w-md sm:max-w-3xl',
        'xl' => 'w-full',
    ];
@endphp

<div {{ $attributes }}>
    <div class="{{ $styles[$size] }}">
        @isset($title)
            <div class="flex content-center justify-between pb-4">
                <div>
                    <h2 class="font-sans text-xl text-gray-900">
                        {{ $title }}
                    </h2>

                    @isset($subtitle)
                        {{ $subtitle }}
                    @endisset
                </div>

                @isset($actions)
                    {{ $actions }}
                @endisset
            </div>
        @endisset
    </div>

    <div class="{{ $styles[$size] }} @if ($padding) p-4 @endif rounded bg-white shadow">
        {{ $slot }}
    </div>

    @isset($body)
        {{ $body }}
    @endisset

    @isset($footer)
        <div class="bg-indigo-150 {{ $styles[$size] }} flex justify-between px-4 py-3 font-sans">
            {{ $footer }}
        </div>
    @endisset
</div>
