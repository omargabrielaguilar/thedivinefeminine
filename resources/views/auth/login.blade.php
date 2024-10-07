@extends('app')

@section('content')
    <x-panel class="mx-auto w-full md:w-1/2">
        <h2 class="my-4 text-center text-2xl">Log in</h2>
        <div class="text-center">
            <a class="btn-github-login" href="{{ url('login/github') }}">
                Log in with
                <strong>GitHub</strong>
                @svg('github', 'inline-block h-6 w-6 align-top')
            </a>
            <p class="my-2 text-base">or</p>
        </div>
        @include('partials.log-in-form')
    </x-panel>
@endsection
