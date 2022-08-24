<div class="mt-8 render-block render-block__tabs"
    x-data="{
        selectedId: null,
        init() {
            // Set the first available tab on the page on page load.
            this.$nextTick(() => this.select(this.$id('tab', 1)))
        },
        select(id) {
            this.selectedId = id
        },
        isSelected(id) {
            return this.selectedId === id
        },
        whichChild(el, parent) {
            return Array.from(parent.children).indexOf(el) + 1
        }
    }"
    x-id="['tab']">

    <!-- Tab List -->
    <ul x-ref="tablist"
        @keydown.right.prevent.stop="$focus.wrap().next()"
        @keydown.home.prevent.stop="$focus.first()"
        @keydown.page-up.prevent.stop="$focus.first()"
        @keydown.left.prevent.stop="$focus.wrap().prev()"
        @keydown.end.prevent.stop="$focus.last()"
        @keydown.page-down.prevent.stop="$focus.last()"
        role="tablist"
        class="flex items-stretch -mb-px">

        @foreach ($tabs as $tab)
            <li>
                <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))"
                    @click="select($el.id)"
                    @mousedown.prevent
                    @focus="select($el.id)"
                    type="button"
                    :tabindex="isSelected($el.id) ? 0 : -1"
                    :aria-selected="isSelected($el.id)"
                    :class="isSelected($el.id) ? 'border-gray-200 bg-white' : 'border-transparent'"
                    class="inline-flex px-5 py-2.5 border-t border-l border-r rounded-t-md"
                    role="tab">{{ $tab }}</button>
            </li>
        @endforeach
    </ul>

    <div role="tabpanels"
        class="bg-white border border-gray-200 rounded-b-md">
        @foreach ($panels as $panel)
            <section x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))"
                role="tabpanel"
                class="p-8">
                @foreach ($panel as $block)
                    <x-dynamic-component :component="'trov::components.blocks.' . $block['type']"
                        :data="$block['data']" />
                @endforeach
            </section>
        @endforeach
    </div>

</div>
