<?php

namespace App\View\Blocks;

use Illuminate\View\Component;

class Tabs extends Component
{
    public $tabs = [];

    public $panels = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
        if ($data['items']) {
            foreach ($data['items'] as $tab) {
                $this->tabs[] = $tab['title'];
                $this->panels[] = $tab['content'];
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('trov::components.blocks.tabs');
    }
}
