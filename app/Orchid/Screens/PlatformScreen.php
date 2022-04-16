<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Models\Page;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    public $name = 'Страницы';

    public function query(): array
    {
        return [
            "pages" => Page::get()
        ];
    }

    public function commandBar(): array
    {
        return [

        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): array
    {
        return [
            Layout::table('pages', [
                TD::make('name', 'Название')->render(function ($page) {
                    return Link::make($page->title)
                        ->route('platform.page', ["page" => $page->id, "lang" => config('app.fallback_locale')]);;
                }),
            ]),
        ];
    }
}
