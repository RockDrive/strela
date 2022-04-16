<?php

namespace App\Orchid\Screens\Pages;

use App\Models\CompBind;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use function config;

class AboutEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Редактирование страницы';
    public $page;
    public $lang;
    public $component;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(CompBind $compBind, $lang): array
    {
        $this->page = $compBind->page;
        $this->lang = $lang;
        $this->name .= " - " . $this->page->title;
        $this->component = $compBind->component;
        return [
            "fields" => $this->component->model::firstWhere("lang", $lang)
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        $locLinks = [];
        foreach (config('app.locales') as $locale => $title) {
            $link = Link::make($title . " (" . $locale . ")")
                ->route('platform.page', ["page" => $this->page, "lang" => $locale])
                ->right();
            if ($this->lang == $locale) {
                $link = $link->icon('control-play');
            }
            $locLinks[] = $link;
        }
        return [
            DropDown::make('Язык (' . config('app.locales')[$this->lang] . ')')
                ->icon('flag')
                ->list($locLinks),
            Button::make('Сохранить')
                ->icon('note')
                ->method('createOrUpdate'),
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
            Layout::rows([
                "title" => Input::make('fields.title')
                    ->type('text')
                    ->title('Заголовок'),

                "picture" => Picture::make('fields.picture')
                    ->title('Изображение')->targetId(),

                "description" => Quill::make('fields.description')
                    ->toolbar(["text", "color", "header", "list"])
                    ->title('Описание'),
            ]),
        ];
    }

    public function createOrUpdate(CompBind $compBind, $lang, Request $request)
    {
        $fields = $request->input('fields');
        $fields["lang"] = $lang;
        $component = $compBind->component;
        $Model = $component->model::where("lang", $lang);
        if($Model->count() > 0) {
            $Model->update($fields);
        } else {
            $component->model::create($fields);
        }
        Toast::info("Успешно сохранено.");
    }
}
