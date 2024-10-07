@props([
    'url' => null,
    'route' => null,
    'show' => true,
])

@if ($show)
    <a class="whitespace-nowrap px-4 py-1 hover:bg-indigo-600 hover:text-white" href="{{ $url ?? route($route) }}">
        {{ $slot }}
    </a>
@endif
