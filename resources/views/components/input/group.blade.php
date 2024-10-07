@props([
    'name' => null,
    'label' => null,
    'labelClass' => null,
])

<div
    {{ $attributes->except('v-text')->class('flex items-center') }}
>
    @if (isset($name) && isset($label))
        <label for="{{ $name }}" class="{{ $labelClass }} mr-2 font-extrabold text-indigo-900">
            {{ $label }}
        </label>
    @endif

    <span
        class="border-form-200 rounded-l-md border bg-indigo-300 p-2"
        {{ $attributes->only('v-text') }}
    ></span>
    <div class="flex-1">
        {{ $slot }}
    </div>
</div>
