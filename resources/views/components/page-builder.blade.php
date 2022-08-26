<div class="content">
    @foreach ($content as $container)
        <div @class([
            'space-y-8 px-0 container',
            'bg-primary-500' => $container['bg_color'] == 'primary',
            'bg-secondary-500' => $container['bg_color'] == 'secondary',
            'bg-tertiary-500' => $container['bg_color'] == 'tertiary',
            'bg-accent-500' => $container['bg_color'] == 'accent',
            'bg-gray-300' => $container['bg_color'] == 'gray',
        ])>
            @if ($container['blocks'])
                <x-blocks :blocks="$container['blocks']" />
            @endif
        </div>
    @endforeach
</div>