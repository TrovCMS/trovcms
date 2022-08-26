<x-dropdown>
    <x-slot name="trigger">
        <div class="text-secondary-400 hover:text-secondary-500 focus:text-secondary-500">
            {{-- <svg width="32" height="32" viewBox="0 0 1024 1024"><path fill="currentColor" class="w-8 h-8" fill-opacity=".15" d="M512 140c-205.4 0-372 166.6-372 372s166.6 372 372 372s372-166.6 372-372s-166.6-372-372-372zM327.6 701.7c-2 .9-4.4 0-5.3-2.1c-.4-1-.4-2.2 0-3.2L421 470.9L553.1 603l-225.5 98.7zm375.1-375.1L604 552.1L471.9 420l225.5-98.7c2-.9 4.4 0 5.3 2.1c.4 1 .4 2.1 0 3.2z"/><path fill="currentColor" d="M322.3 696.4c-.4 1-.4 2.2 0 3.2c.9 2.1 3.3 3 5.3 2.1L553.1 603L421 470.9l-98.7 225.5zm375.1-375.1L471.9 420L604 552.1l98.7-225.5c.4-1.1.4-2.2 0-3.2c-.9-2.1-3.3-3-5.3-2.1z"/><path fill="currentColor" d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448s448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372s372 166.6 372 372s-166.6 372-372 372z"/></svg> --}}
            <svg width="32" height="32" viewBox="0 0 36 36" class="w-8 h-8" ><path fill="currentColor" d="M20.82 15.31L10.46 9c-.46-.26-1.11.37-.86.84l6.15 10.56l10.56 6.15a.66.66 0 0 0 .84-.86Zm-4 4l3-3l4.55 7.44Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M18 2a16 16 0 1 0 16 16A16 16 0 0 0 18 2Zm1 29.95v-2.42h-2v2.42A14 14 0 0 1 4.05 19h2.42v-2H4.05A14 14 0 0 1 17 4.05v2.42h2V4.05A14 14 0 0 1 31.95 17h-2.42v2h2.42A14 14 0 0 1 19 31.95Z" class="clr-i-outline clr-i-outline-path-2"/><path fill="none" d="M0 0h36v36H0z"/></svg>
            <span class="sr-only">Menu</span>
        </div>
    </x-slot>
    <nav aria-label="mobile">
        <ul class="p-2 mt-2 space-y-1 bg-gray-800 rounded-md shadow-lg ring-1 ring-black ring-opacity-5">
            <li>
                <x-menus.mobile.link href="{{ route('welcome') }}">Home</x-menus.mobile.link>
            </li>
            <li>
                <x-menus.mobile.link href="/about">About</x-menus.mobile.link>
            </li>
            <li>
                <x-menus.mobile.link href="/contact">Contact</x-menus.mobile.link>
            </li>
        </ul>
    </nav>
</x-dropdown>