@props([
    'href' => '#'
])
<a
    href="{{ $href }}"
    aria-current="{{ active_route($href) ? 'page' : false }}"
    @class([
        "text-white transition duration-150 ease-in-out block py-2 px-4 text-center whitespace-nowrap rounded cursor-pointer reset-link",
        "bg-secondary-500 text-secondary-100" => active_route($href)
    ])
>
    {{ $slot }}
</a>