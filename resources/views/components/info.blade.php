@props([
    'icon' => null,
    'iconColor' => 'text-gray-500',
    'textColor' => 'text-gray-500',
])

<span {{
    $attributes->merge([
        'class' => "{$iconColor} text-sm flex items-center",
    ])
}}>
    @if ($icon)
        @svg($icon, 'mr-1 inline w-4 fill-current')
    @endif

    <span class="{{ $textColor }}">
        {{ $slot }}
    </span>
</span>
