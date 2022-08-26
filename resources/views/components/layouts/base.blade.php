@props([
    'meta' => []
])

@php
    $title = $meta->title ? $meta->title . ' | ' . config('app.name') : config('app.name');
    $description = $meta->description ? $meta->description : config('app.description');
    $robots = $meta->robots ? 'index,follow' : 'noindex,nofollow';
    $ogImage = $meta->ogImage ? $meta->ogImage : null;
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">

        <title>{{ $title }}</title>
        <meta name="description" content="{{ $description }}" />
        <meta name="robots" content="{{ $robots }}" />

        <link rel="canonical" href="{{ trailing_slash_it(url()->current()) }}">

        <!-- Open Graph -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="{{ config('brand.social_media.twitter') }}" />
        <meta name="twitter:creator" content="{{ config('brand.social_media.twitter') }}" />

        <meta property="og:url" content="{{ trailing_slash_it(url()->current()) }}" />
        <meta property="og:type" content="website" />
        <meta property="og:title" content="{{ $title }}" />
        <meta property="og:description" content="{{ $description }}" />
        <meta property="og:locale" content="{{ app()->getLocale() }}" />
        <meta property="og:site_name" content="{{ config('app.name') }}" />

        @if ($ogImage)
            <meta property="og:image" content="{{ $ogImage->getSizeUrl('large') }}" />
            <meta property="og:image:alt" content="{{ $ogImage->alt }}" />
            <meta property="og:image:width" content="{{ $ogImage->width }}" />
            <meta property="og:image:height" content="{{ $ogImage->height }}" />
        @endif

        @yield('meta')

        @if (filled($fontsUrl = config('filament.google_fonts')))
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="{{ $fontsUrl }}" rel="stylesheet" />
        @endif

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}" />
        @stack('styles')

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        @livewireStyles
    </head>

    <body class="h-full font-sans text-gray-100 bg-gray-900">

        <div class="flex flex-col h-full">
            <x-skip-link />
            @yield('header')

            <main id="site-main" class="flex-1">
                @yield('hero')
                <div id="site-main-content">
                    {{ $slot }}
                </div>
            </main>

            @yield('footer')
        </div>

        @livewireScripts

        @stack('scripts')

    </body>

</html>