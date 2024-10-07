@props([
    'name',
    'label' => '',
    'help',
    'value' => null,
    'type' => 'text',
    'inline' => false,
    'hideLabel' => false,
    'roundedClass' => 'rounded',
])

<div {{ $attributes->only(['class']) }}>
    <label for="{{ $name }}" class="@if ($hideLabel) hidden @endif font-extrabold text-indigo-900">
        {{ $label }}
    </label>

    @php
        $valueName = str($name)
            ->replace('[', '.')
            ->replace(']', '');
    @endphp

    <input
        name="{{ $name }}"
        type="{{ $type }}"
        value="{{ old((string) $valueName, $value) }}"
        {{ $attributes->except('class') }}
        class="border-form-200 placeholder-form-400 {{ $roundedClass }} @unless ($inline) w-full @endunless @unless ($hideLabel) mt-1 @endunless form-input bg-white"
    />

    @isset($help)
        <span class="mt-1 block text-gray-500">{{ $help }}</span>
    @endisset
</div>
