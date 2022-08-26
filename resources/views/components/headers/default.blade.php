<header id="site-header" class="py-4 bg-gray-900/40 absolute inset-x-0 top-0 z-20 h-16">
    <div class="container">
        <div class="flex items-center justify-between">
            <div>
                <a href="{{ route('welcome') }}">
                    <x-filament::brand />
                </a>
            </div>
            <div>
                <div class="lg:hidden">
                    <x-menus.mobile.index />
                </div>

                <div class="hidden lg:flex">
                    <x-menus.primary.index />
                </div>
            </div>
        </div>
    </div>
</header>