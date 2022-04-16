<?php

namespace App\View\Components\Travelline;

use Illuminate\View\Component;

class Mini extends Component
{

    public $lang;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($lang)
    {
        $this->lang = $lang;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.travelline.mini');
    }
}
