<?php

namespace App\View\Components\Menu;

use App\Models\Menu;
use Illuminate\View\Component;

class Main extends Component
{
    public $menu;

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
        $menu = new Menu();
        foreach ($menu->getMenu("main")->where('type', 'main')->orderBy('sort', 'asc')->get() as $arItem) {
            $this->menu[] = [
                "page" => $arItem->page->template . "." . config('app.locale'),
                "title" => $arItem->title
            ];
        }
        return view('components.menu.main');
    }
}
