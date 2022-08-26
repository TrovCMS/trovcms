@props([
    'sidebar' => null,
])

<div class="container">
    <div class="grid gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2">
            {{ $slot }}
        </div>
        <aside class="lg:col-span-1">
            {{ $sidebar }}
        </aside>
    </div>
</div>