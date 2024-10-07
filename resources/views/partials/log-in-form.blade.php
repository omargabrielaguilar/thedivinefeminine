@if ($errors->default->first('email'))
    <p class="mt-2 text-sm italic text-red-500">
        {{ $errors->default->first('email') }}
    </p>
@endif

<x-form :action="route('login')">
    <x-input.text
        name="email"
        label="Email"
        placeholder="Email address"
        :hideLabel="true"
        autofocus="autofocus"
    ></x-input.text>
    @if ($errors->loginForm->first('email'))
        <p class="mt-2 text-sm italic text-red-500">
            {{ $errors->loginForm->first('email') }}
        </p>
    @endif

    <x-input.text
        name="password"
        label="Password"
        type="password"
        placeholder="Password"
        :hideLabel="true"
        class="mt-2"
    ></x-input.text>
    @if ($errors->loginForm->first('password'))
        <p class="mt-2 text-sm italic text-red-500">
            {{ $errors->loginForm->first('password') }}
        </p>
    @endif

    <div class="mt-8 md:flex md:justify-between">
        <x-button.primary type="submit" size="md" class="block w-full md:w-auto">Log in</x-button.primary>

        <x-button.secondary type="submit" size="md" href="/password/reset" class="mt-4 block w-full md:mt-0 md:w-auto">
            Reset Password
        </x-button.secondary>
    </div>
</x-form>
