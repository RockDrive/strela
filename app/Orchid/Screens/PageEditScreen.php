<?php

namespace App\Orchid\Screens;

use App\Http\Controllers\Pages\AboutController;
use App\Models\Component;
use App\Models\Page;
use App\Orchid\Layouts\Components\AboutField;
use App\Orchid\Layouts\Components\ContactField;
use App\Orchid\Layouts\Components\RoomsField;
use App\Orchid\Layouts\Components\SliderField;
use App\Orchid\Layouts\Rows\PageRows;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use function config;
use function request;

class PageEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Редактирование страницы';
    public $page;
    public $locales;
    public $lang;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Page $page): array
    {
        $this->name .= " - " . $page->title;
        $this->page = $page;
        $this->locales = config('app.locales');
        $this->lang = request('lang');
        return [];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        $locLinks = [];
        foreach ($this->locales as $locale => $title) {
            $link = Link::make($title . " (" . $locale . ")")
                ->route('platform.page', ["page" => $this->page, "lang" => $locale])
                ->right();
            if ($this->lang == $locale) {
                $link = $link->icon('control-play');
            }
            $locLinks[] = $link;
        }
        return [
            DropDown::make('Язык (' . $this->locales[$this->lang] . ')')
                ->icon('flag')
                ->list($locLinks),
            Button::make('Сохранить')
                ->icon('save-alt')
                ->method('savePage', [$this->lang]),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): array
    {
        return [
            PageRows::{$this->page->template}(),
        ];
    }

    public function savePage($locale, Request $request)
    {
        $components = $request->get('fields');

        dd($components);
        foreach ($components as $compName => $fields) {
            Component::firstWhere("name", $compName)->localUpdate($fields, $locale);
            $components->itemUpdate($fields, $locale);
        }

//        Toast::info("Успешно сохранено " . $locale);
    }
}
