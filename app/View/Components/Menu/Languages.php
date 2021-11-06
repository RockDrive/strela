<?php

namespace App\View\Components\Menu;

use Illuminate\View\Component;

class Languages extends Component
{

    public $langs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if (app()->getLocale() == "ru") {
            $url = request()->segments();
        } else {
            $url = request()->segments();
            $lang = array_shift($url);
        }
        $url = implode("/", $url);
        foreach (config('app.locales') as $lang) {
            if ($lang == "ru") {
                $this->langs[$lang] = url($url);
            } else {
                $this->langs[$lang] = url($lang . "/" . $url);
            }
        }
        return view('components.menu.languages');
    }
}
