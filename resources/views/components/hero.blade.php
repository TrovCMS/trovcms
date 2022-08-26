@props([
    'loading' => 'eager'
])

<aside class="relative flex items-center justify-center min-h-[256px] md:min-h-[322px] lg:min-h-[448px] filament-gradient pt-16">
    @if ($type == 'image' && ($media || $cta))
        <img src="{{ $media->url }}"
            alt="{{ $media->alt }}"
            width="{{ $media->width }}"
            height="{{ $media->height }}"
            srcset="{{ $media->url }} 1200w, {{ $media->getSizeUrl('large') }} 1024w, {{ $media->getSizeUrl('medium') }} 640w"
            sizes="(max-width: 1200px) 100vw, 1200px"
            loading="{{ $loading }}"
            class="absolute inset-0 z-0 object-cover w-full h-full opacity-20"
        />
        <div class="container z-10">
            <p class="text-2xl md:text-3xl lg:text-5xl font-bold text-white drop-shadow-md text-center">{{ $cta }}</p>
        </div>
    @elseif ($type == 'oembed' && ($media || $cta))
        @php
            $styles = $media['responsive'] ? "aspect-ratio: {$media['width']} / {$media['height']}; width: 100%; height: auto;" : null;
            $params = [
                'autoplay' => $media['autoplay'] ? 1 : 0,
                'loop' => $media['loop'] ? 1 : 0,
                'title' => $media['show_title'] ? 1 : 0,
                'byline' => $media['byline'] ? 1 : 0,
                'portrait' => $media['portrait'] ? 1 : 0,
            ];
        @endphp
        <div class="container z-10 py-8">
            <iframe
                src="{{ $media['embed_url'] }}?{{ http_build_query($params) }}"
                width="{{ $media['responsive'] ? $media['width'] : ($media['width'] ?: '640') }}"
                height="{{ $media['responsive'] ? $media['height'] : ($media['height'] ?: '480') }}"
                frameborder="0"
                allow="autoplay; fullscreen; picture-in-picture"
                allowfullscreen
                style="{{ $styles }}"
            ></iframe>
            <p class="text-2xl font-bold text-white drop-shadow-md text-center mt-8">{{ $cta }}</p>
        </div>
    @else
        {{ $slot }}
    @endif
</aside>