@props([
    'route',
])

<a
    href="{{ route($route) }}"
    :class="{
        'block py-4': show,
        'hidden lg:block py-2': !show,
    }"
    class="@if (request()->isContainedBy($route)) bg-indigo-700 @endif rounded px-3 hover:underline"
>
    {{ $slot }}
</a>
