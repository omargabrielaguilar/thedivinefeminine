<div v-cloak {{ $attributes->merge(['class' => 'relative']) }}>
    <menu-toggle>
        <div slot-scope="{show, toggle}">
            <button v-on:click="toggle" {{ $trigger->attributes }}>
                {{ $trigger }}
            </button>
            <div
                class="right-0 z-50 mt-6 flex flex-col rounded border border-indigo-600 bg-white py-1 text-indigo-600"
                :class="{
                    'absolute': show,
                    'hidden': !show,
                }"
            >
                {{ $items }}
            </div>
        </div>
    </menu-toggle>
</div>
