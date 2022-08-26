<div x-data class="relative">

    <button type="button" class="block" x-on:click="$refs.panel.toggle">
        {{ $trigger }}
    </button>

    <div x-ref="panel" x-float.placement.bottom-end.flip.trap class="absolute z-50 hidden mt-2">
        {{ $slot }}
    </div>
</div>