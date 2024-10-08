@extends('app')

@section('content')
    @isset($title)
        <h2 class="font-sans text-2xl text-gray-900">{{ $title }}</h2>
    @endisset

    <div class="mx-auto flex w-full flex-col py-3 md:flex-row">
        <div class="w-full space-y-6 md:w-1/2">
            @hasSection('sidebar')
                <div class="flex flex-wrap items-start space-x-6 space-y-0 md:flex-col md:space-x-0 md:space-y-6">
                    @yield('sidebar')
                </div>
            @endif

            @yield('actions')
        </div>
        <div class="mt-6 w-full md:ml-6 md:mt-0 md:w-3/4">
            <div class="space-y-6">
                @yield('list')
            </div>
        </div>
    </div>
@endsection
