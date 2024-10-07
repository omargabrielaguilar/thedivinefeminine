@props([
    'href' => null,
    'icon' => null,
    'size' => 'sm',
])

<x-button.base
    :href="$href"
    :icon="$icon"
    :size="$size"
    :attributes="$attributes->merge([
        'class' => 'bg-indigo-800 hover:bg-indigo-500 text-white transition duration-150 ease-in-out'
    ])"
>
    {{ $slot }}
</x-button.base>
