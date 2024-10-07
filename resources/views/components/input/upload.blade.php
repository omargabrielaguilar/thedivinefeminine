@props([
    'name',
    'help',
])

<input name="{{ $name }}" type="file" {{ $attributes }} />

@isset($help)
    <span class="mt-1 block text-gray-500">{{ $help }}</span>
@endisset
