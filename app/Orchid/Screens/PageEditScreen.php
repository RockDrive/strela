<?php

namespace App\Orchid\Screens;

use App\Http\Controllers\Pages\AboutController;
use App\Models\CompBind;
use App\Models\Component;
use App\Models\Page;
use App\Orchid\Layouts\Components\About;
use App\Orchid\Layouts\Components\ContactField;
use App\Orchid\Layouts\Components\RoomsField;
use App\Orchid\Layouts\Components\Banner;
use App\Orchid\Layouts\Rows\PageRows;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
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
    public $lang;
    public $page;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Page $page, $lang): array
    {
        $this->name .= " - " . $page->title;
        $this->lang = $lang;
        $this->page = $page;

        return [
            "components" => $page->components()->orderBy('sort', 'asc')->get()
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
            ModalToggle::make('SEO')
                ->modal('seoModal')
                ->method('seoUpdate')
                ->asyncParameters($this->page->getSeo($this->lang))
                ->icon('magnifier'),
            DropDown::make('Язык (' . config('app.locales')[$this->lang] . ')')
                ->icon('flag')
                ->list($locLinks),
            ModalToggle::make('Добавить блок')
                ->modal('blockModal')
                ->method('addBlock')
                ->icon('plus'),
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
            Layout::table('components', [
                TD::make('name', 'Компонент')->render(function ($component) {
                    return ModalToggle::make($component->name)
                        ->modal('editModal')
                        ->method('update', [$component->id])
                        ->asyncParameters($component->id);
                }),
                TD::make()
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(function ($component) {
                        return Link::make(__('Edit'))
                            ->icon('pencil')
                            ->route('platform.component.edit', [$component->id, $this->lang]);
                    }),
//                TD::make()
//                    ->align(TD::ALIGN_CENTER)
//                    ->width('100px')
//                    ->render(function ($component) {
//                        return Button::make(__('Delete'))
//                            ->icon('trash')
//                            ->confirm("Запись будет удалена безвозвратно.")
//                            ->method('delete', [$component->id]);
//                    }),
            ]),
            Layout::modal('blockModal', [
                Layout::rows([
                    Select::make('fields.component_id')->required()
                        ->fromModel(Component::class, 'name')
                        ->title('Компонент'),
                    Input::make('fields.sort')
                        ->type('number')
                        ->value(100)
                        ->required()
                        ->title('Сортировка'),
                ]),
            ])->title('Добавление блока'),
            Layout::modal('editModal', [
                Layout::rows([
                    Input::make('fields.name')
                        ->type('text')
                        ->required()
                        ->title('Название'),
                    Input::make('fields.sort')
                        ->type('number')
                        ->required()
                        ->title('Сортировка'),
                ]),
            ])->async('asyncGetComp')->title('Редактирование блока'),
            Layout::modal('seoModal', [
                Layout::rows([
                    Input::make('fields.url')
                        ->required()
                        ->title('URL'),
                    Input::make('fields.title')
                        ->title('Заголовок (title)'),
                    TextArea::make('fields.description')
                        ->title('Описание (description)'),
                    Input::make('fields.keywords')
                        ->title('Ключевые слова (keywords)'),
                ]),
            ])->async('asyncGetData')->title('SEO настройки'),
        ];
    }

    public function addBlock(Page $page, $lang, Request $request): void
    {
        $result = $request->input("fields");
        $result["name"] = Component::find($result["component_id"])->name;
        $page->components()->create($result)
            ->fields()
            ->create(["lang" => config('app.fallback_locale')]);

        Toast::success('Блок успешно добавлен.');
    }

    public function delete(CompBind $component)
    {
        $component->delete();
        Toast::error('Компонент успешно удален.');
    }

    public function update(CompBind $component, Request $request)
    {
        $fields = $request->input("fields");
        $component->update($fields);
        Toast::info('Компонент успешно изменен.');
    }

    public function asyncGetComp(CompBind $component): array
    {
        return [
            "fields" => $component,
        ];
    }


    public function asyncGetData($seoFields): array
    {
        return [
            "fields" => $seoFields,
        ];
    }

    public function seoUpdate(Request $request, Page $page, $lang): void
    {
        $result = $request->input("fields");
        $seo = $page->seo()->firstWhere("lang", $lang);
        if($seo) {
            $seo->update($result);
        } else {
            $result["lang"] = $lang;
            $page->seo()->create($result);
        }
        Toast::success('Блок успешно добавлен.');
    }
}
