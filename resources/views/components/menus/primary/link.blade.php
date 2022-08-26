@props([
    'href' => '#'
])
<a
    href="{{ $href }}"
    aria-current="{{ active_route($href) ? 'page' : false }}"
    @class([
        "text-white hover:text-primary-300 focus:text-primary-300",
        "text-primary-300" => active_route($href)
    ])
>
    {{ $slot }}
</a>