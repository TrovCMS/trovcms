<x-layouts.base :meta="$page->meta">

    @section('header')
        <x-headers.default />
    @endsection

    @section('hero')
        <x-hero :data="$page->hero" />
    @endsection

    <div class="py-8 lg:py-12">
        @if ($page->content)
            <x-page-builder :content="$page->content" />
        @endif
    </div>

    @section('footer')
        <x-footers.default />
    @endsection

</x-layouts.base>