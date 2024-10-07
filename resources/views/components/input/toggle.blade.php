@props([
    'name',
    'label',
    'value' => null,
])

<div>
    <label for="{{ $name }}" class="text-xs text-gray-700">{{ $label }}</label>
    <div class="relative mr-2 inline-block w-10 select-none align-middle transition duration-200 ease-in">
        <input type="hidden" name="{{ $name }}" value="0" />
        <input
            type="checkbox"
            name="{{ $name }}"
            @if ((string) old($name, $value) === "1") checked @endif
            value="1"
            class="toggle-checkbox absolute block h-6 w-6 cursor-pointer appearance-none rounded-full border-4 bg-white checked:right-0 checked:border-indigo-900"
            {{ $attributes->except(['class']) }}
        />
        <label
            for="{{ $name }}"
            class="toggle-label block h-6 cursor-pointer overflow-hidden rounded-full bg-gray-300"
        ></label>
    </div>
</div>
