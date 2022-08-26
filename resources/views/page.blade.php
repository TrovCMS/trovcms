<x-layouts.base :meta="$page->meta">

    @section('header')
        <x-headers.default />
    @endsection

    @section('hero')
        <x-hero :data="$page->hero" />
    @endsection

    <div class="py-8 lg:py-12">
        <x-layouts.two-column-right>
            @if ($page->content)
                <x-page-builder :content="$page->content" />
            @endif

            <x-slot name="sidebar">
                <x-widget heading="Check out our awesome blog">
                    <p>When we get around to writing some posts.</p>
                </x-widget>
            </x-slot>

        </x-layouts.two-column-right>
    </div>

    @section('footer')
        <x-footers.default />
    @endsection

</x-layouts.base>