<?php

namespace App\Orchid\Screens;

use App\Models\CompBind;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;
use function config;

class ComponentEditScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Редактирование компонента';
    public $bind;
    public $lang;
    public $component;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(CompBind $compBind, $lang): array
    {
        $this->name .= " - " . $compBind->name;
        $this->bind = $compBind;
        $this->lang = $lang;
        return $compBind->getFields($lang);
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
                ->route('platform.component.edit', [$this->bind->id, $locale])
                ->right();
            if ($this->lang == $locale) {
                $link = $link->icon('control-play');
            }
            $locLinks[] = $link;
        }
        return [
            Link::make("Вернуться")
                ->icon('action-undo')
                ->route('platform.page', [$this->bind->page, $this->lang]),
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
            new $this->bind->component->template(),
        ];
    }

    public function createOrUpdate(CompBind $compBind, $lang, Request $request)
    {
        $result = $request->input('fields');
        $arArray = $request->input('array');
        if($arArray) {
            foreach ($arArray as $name => $items) {
                $result[$name] = json_encode($items);
            }
        }
        $fields = $compBind->fields()->where("lang", $lang);
        if ($result) {
            if ($fields->count() > 0) {
                $fields->update($result);
            } else {
                $result["lang"] = $lang;
                $compBind->fields()->create($result);
            }
        }
        Toast::info("Успешно сохранено.");
    }
}
