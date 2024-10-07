@props([
    'href' => null,
    'icon' => null,
])

@php
    $element = isset($href) ? 'a' : 'button';
@endphp

<{{ $element }}
    @isset($href) href="{{ $href }}" @endisset
    {{ $attributes->class('leading-none') }}
>
    @svg($icon, 'inline w-5 fill-current')
</{{ $element }}>
