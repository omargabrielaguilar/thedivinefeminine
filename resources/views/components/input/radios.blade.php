@props([
    'name',
    'label',
    'help',
    'options' => [],
    'value' => null,
])

<div {{ $attributes->only(['class']) }}>
    <label for="{{ $name }}" class="block font-extrabold text-indigo-900">
        {{ $label }}
    </label>

    @isset($help)
        <span class="mt-1 block text-gray-500">{{ $help }}</span>
    @endisset

    @foreach ($options as $label => $option)
        <label class="inline-flex items-center">
            <input
                type="radio"
                name="{{ $name }}"
                value="{{ $option }}"
                class="border-form-200 form-radio bg-white"
                @if ($option == old($name, $value)) checked @endif
            />
            <span class="ml-2 mr-6">{{ $label }}</span>
        </label>
    @endforeach
</div>
