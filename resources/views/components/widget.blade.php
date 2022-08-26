@props([
    'heading' => null,
])

<div class="p-6 space-y-6 border border-black shadow-sm rounded-xl bg-gray-800">
    @if ($heading)
        <h3 class="text-xl font-bold tracking-tight">
            {{ $heading }}
        </h3>
    @endif

    <div>
        {{ $slot }}
    </div>
</div>