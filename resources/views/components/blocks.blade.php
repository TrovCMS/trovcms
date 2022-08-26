@props([
    'blocks' => []
])

@if ($blocks)
    @foreach ($blocks as $block)
        <x-dynamic-component
            :component="'blocks.' . $block['type']"
            :data="$block['data']"
        />
    @endforeach
@endif
