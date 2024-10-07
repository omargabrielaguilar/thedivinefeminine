@php
    $styles = $is_home ? 'bg-black text-gray-500' : 'border-t border-gray-300 bg-white text-gray-600';
@endphp

<div class="{{ $styles }} w-full py-4">
    <div class="mx-auto max-w-md font-sans text-lg sm:max-w-6xl">
        <footer>
            <div class="flex flex-col justify-between px-8 text-center lg:flex-row lg:text-left xl:px-0">
                <div class="hover:underline">
                    <a href="http://tighten.com/" target="_blank">&copy; Tighten {{ date('Y') }}</a>
                </div>
                <div class="invisible lg:visible">|</div>
                <div class="hover:underline">
                    <a href="https://github.com/tightenco/symposium" target="_blank">Source &amp; roadmap on GitHub</a>
                </div>
                <div class="invisible lg:visible">|</div>
                <div class="hover:underline">
                    <a href="http://rdohms.github.io/pronto/" target="_blank">Submit your talks easily with Pronto!</a>
                </div>
            </div>
        </footer>
    </div>
</div>
