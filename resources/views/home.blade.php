@extends('app')

@section('content')
    <div
        class="pm-12 mx-auto flex max-w-md flex-col items-center justify-around px-8 pb-6 pt-0 sm:mt-3 sm:max-w-6xl md:flex-row md:py-12"
    >
        <div class="space-y-8">
            <h1 class="font-sans text-5xl leading-none text-black">
                Connecting
                <br />
                Speakers
                <br />
                &amp; Conferences
            </h1>
            <a
                class="border-indigo text-indigo hover:bg-indigo block rounded rounded-lg border px-10 py-5 transition duration-150 ease-in-out hover:text-white md:inline-block"
                href="https://www.youtube.com/watch?v=60hxVJpEXhw"
                target="_blank"
            >
                @svg('rectangle', 'mr-2 inline w-2')
                Watch Demo
            </a>
        </div>
        @svg('home', 'max-w-md sm:pr-4 md:order-first')
    </div>

    <div class="relative bg-indigo-100">
        <div class="mx-auto max-w-md px-1 py-12 pb-40 sm:max-w-6xl">
            <div class="mx-auto mb-16 flex flex-col items-center">
                @svg('podium', 'mw-24')
                <h2 class="text-indigo text-center font-sans text-5xl">Conference Speakers</h2>
                <div class="max-w-2xl text-center font-sans text-3xl">
                    Symposium helps conference speakers plan and manage talk abstracts, CFP submissions, bios, photos,
                    and speaking schedule.
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="mb-8 w-full px-6 pb-6 md:w-1/2 md:pb-0 lg:w-1/3 lg:pl-0">
                    @svg('icon_tracktalks', 'mx-auto w-16 md:ml-3')
                    <div class="mb-4 mt-5 text-center font-sans text-2xl font-semibold md:text-left">Track talks</div>
                    <div class="font-sans text-xl">
                        Track all of your talks, each with one or more versions and each version with a full revision
                        history.
                    </div>
                </div>
                <div class="mb-8 w-full px-6 pb-6 md:w-1/2 md:pb-0 lg:w-1/3">
                    @svg('icon_versioncontrol', 'mx-auto w-16 md:ml-3')
                    <div class="mb-4 mt-5 text-center font-sans text-2xl font-semibold md:text-left">
                        Talk version control
                    </div>
                    <div class="font-sans text-xl">
                        Look at which of each talk you submitted to each conference, and how many times each talk has
                        been accepted and rejected.
                    </div>
                </div>
                <div class="mb-8 w-full px-6 pb-6 md:w-1/2 md:pb-0 lg:w-1/3 lg:pr-0">
                    @svg('icon_trackconferences', 'mx-auto w-16 md:ml-3')
                    <div class="mb-4 mt-5 text-center font-sans text-2xl font-semibold md:text-left">
                        Track conferences
                    </div>
                    <div class="font-sans text-xl">
                        Track which conferences have accepted or rejected your talk submissions.
                    </div>
                </div>
                <div class="mb-8 w-full px-6 pb-6 md:w-1/2 md:pb-0 lg:w-1/3 lg:pl-0">
                    @svg('icon_find', 'mx-auto w-16 md:ml-3')
                    <div class="mb-4 mt-5 text-center font-sans text-2xl font-semibold md:text-left">
                        Find conferences
                    </div>
                    <div class="font-sans text-xl">
                        Find which conferences you're interested in applying to speak at; favorite them, track them, and
                        get reminders when their CFPs open and close.
                    </div>
                </div>
                <div class="mb-8 w-full px-6 pb-6 md:w-1/2 md:pb-0 lg:w-1/3">
                    @svg('icon_bios', 'mx-auto w-16 md:ml-3')
                    <div class="mb-4 mt-5 text-center font-sans text-2xl font-semibold md:text-left">Bios</div>
                    <div class="font-sans text-xl">
                        Store and version multiple biographies for sending in with your talk submissions.
                    </div>
                </div>
                <div class="mb-8 w-full px-6 pb-6 md:w-1/2 md:pb-0 lg:w-1/3 lg:pr-0">
                    @svg('icon_photos', 'mx-auto w-16 md:ml-3')
                    <div class="mb-4 mt-5 text-center font-sans text-2xl font-semibold md:text-left">Photos</div>
                    <div class="font-sans text-xl">
                        Store multiple revisions of your bio photos, ready to grab snd upload with your talk
                        submissions.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-indigo-500 pb-24">
        <div
            class="relative mx-auto -mt-20 max-w-md rounded-lg bg-white px-0 py-12 shadow sm:mx-10 sm:max-w-6xl md:max-w-4xl lg:mx-auto"
        >
            <div class="flex flex-col items-center">
                @svg('badge')
                <h2 class="text-indigo mb-12 font-sans text-3xl lg:text-5xl">Conference Organizers</h2>
                <div class="mx-auto max-w-3xl px-6 text-center font-sans text-xl md:text-2xl lg:text-3xl">
                    Symposium helps conference organizers receive submissions by allowing speakers to submit to any
                    conference powered by a CFP platform that's compatible with Symposium.
                </div>
            </div>
        </div>
        <div class="mx-auto mt-20 max-w-md sm:max-w-6xl">
            <h2 class="text-center font-sans text-5xl text-white">Our Speakers</h2>
            <div class="mt-16 flex flex-wrap justify-between">
                @foreach ($speakers as $speaker)
                    <div class="flex w-1/2 flex-col items-center sm:w-1/3 xl:w-1/6">
                        <img
                            class="h-32 w-32 rounded-full"
                            style="filter: grayscale(100%)"
                            src="{{ $speaker->profile_picture_hires }}"
                            alt="{{ $speaker->name }} profile picture"
                        />
                        <div class="p-8 text-center text-white">{{ $speaker->name }}</div>
                    </div>
                @endforeach
            </div>
            <div class="mt-20 text-center">
                <a
                    class="rounded border px-8 py-6 font-sans text-xl font-semibold text-white transition duration-150 ease-in-out hover:bg-white hover:text-indigo-800"
                    href="{{ route('speakers-public.index') }}"
                >
                    View all speakers
                </a>
            </div>
        </div>
    </div>

    <div class="bg-indigo-800">
        <div class="mx-auto flex max-w-md flex-col px-8 py-32 sm:max-w-6xl">
            <h2 class="text-center font-sans text-5xl text-white">Conferences</h2>
            <div class="mb-16 mt-20 flex flex-wrap justify-between lg:flex-nowrap">
                @foreach ($conferences as $conference)
                    <div
                        class="relative mb-10 w-full rounded-lg bg-white px-8 pb-24 pt-12 font-sans shadow last:mb-0 lg:mb-0 lg:w-1/3 lg:first:mr-8 lg:last:ml-8"
                    >
                        <div class="mb-12 text-center text-2xl text-indigo-800">{{ $conference->title }}</div>
                        <div class="text-xl font-medium">{{ $conference->event_dates_display }}</div>
                        <div class="mt-6 text-xl">{{ str($conference->description)->limit(100) }}</div>
                        <div class="absolute bottom-0 my-10 block">
                            <a
                                class="text-xl font-semibold text-indigo-800"
                                href="{{ route('conferences.show', $conference) }}"
                            >
                                More Details
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-16 text-center">
                <a
                    class="rounded border px-8 py-6 font-sans text-xl font-semibold text-white transition duration-150 ease-in-out hover:bg-white hover:text-indigo-800"
                    href="{{ route('conferences.index') }}"
                >
                    View all conferences
                </a>
            </div>
        </div>
    </div>
@endsection
