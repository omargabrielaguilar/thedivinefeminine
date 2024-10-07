<div
    {{
        $attributes->class(['fixed inset-x-0 top-32 z-50 mx-auto w-4/5 cursor-pointer rounded p-4 text-center lg:inset-x-auto lg:right-4 lg:w-1/5'])
    }}
    v-dismiss="2000"
>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ $slot }}
</div>
