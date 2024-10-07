@props([
    'href',
    'icon',
    'size' => 'sm',
])

@php
    $element = isset($href) ? 'a' : 'button';
@endphp

<{{ $element }}
    @isset($href) href="{{ $href }}" @endisset
    {{
        $attributes->class([
            'inline-flex items-center justify-center space-x-2 rounded py-2',
            'px-2' => $size === 'sm' && $slot->isEmpty(),
            'px-4' => $size === 'sm' && $slot->isNotEmpty(),
            'px-8 text-lg font-semibold' => $size === 'md',
        ])
    }}
>
    @isset($icon)
        @svg($icon, 'inline h-3 w-3 fill-current')
    @endisset

    @if ($slot->isNotEmpty())
        <span>{{ $slot }}</span>
    @endif
</{{ $element }}>
