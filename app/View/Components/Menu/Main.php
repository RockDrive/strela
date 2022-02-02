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
        $arMenu = Menu::where('type', 'main')
            ->orderBy('sort', 'asc')
            ->get();
        foreach ($arMenu as $arItem) {
            $this->menu[] = [
                "page" => $arItem->page->seo()->url,
                "title" => $arItem->title
            ];
        }
        return view('components.menu.main');
    }
}
