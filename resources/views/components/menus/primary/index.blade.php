<nav aria-label="primary">
    <ul class="flex items-center gap-8">
        <li>
            <x-menus.primary.link href="{{ route('welcome') }}">Home</x-menus.primary.link>
        </li>
        <li>
            <x-menus.primary.link href="/about">About</x-menus.primary.link>
        </li>
        <li>
            <x-menus.primary.link href="/contact">Contact</x-menus.primary.link>
        </li>
        @if(class_exists('App\Models\Faq'))
            <li>
                <x-menus.primary.link href="{{ route('faqs.index') }}">FAQs</x-menus.primary.link>
            </li>
        @endif
        @if(class_exists('App\Models\Post'))
            <li>
                <x-menus.primary.link href="{{ route('blog.index') }}">Blog</x-menus.primary.link>
            </li>
        @endif
    </ul>
</nav>