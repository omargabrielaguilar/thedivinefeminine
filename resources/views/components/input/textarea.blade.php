@props([
    'name',
    'label',
    'help',
    'value' => null,
    'cols' => 50,
    'rows' => 10,
    'hideLabel' => false,
])

<div {{ $attributes->only(['class']) }}>
    <label for="{{ $name }}" class="@if ($hideLabel) hidden @endif block font-extrabold text-indigo-900">
        {{ $label }}
    </label>

    <textarea
        name="{{ $name }}"
        cols="{{ $cols }}"
        rows="{{ $rows }}"
        {{ $attributes->except('class') }}
        class="border-form-200 placeholder-form-400 @unless ($hideLabel) mt-1 @endunless form-input w-full rounded bg-white"
    >
{{ old($name, $value) }}</textarea
    >

    @isset($help)
        <span class="mt-1 block text-gray-500">{{ $help }}</span>
    @endisset
</div>
