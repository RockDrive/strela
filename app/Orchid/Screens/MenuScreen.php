<?php

namespace App\Orchid\Screens;

use App\Models\Component;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class MenuScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Меню';
    public $lang;
    public $type;

    /**
     * Query data.
     *
     * @return array
     */
    public function query($type, $lang): array
    {
        $this->type = $type;
        $this->lang = $lang;
        $menu = new Menu();
        return [
            "menus" => $menu->getMenu("main", $lang)->orderBy('sort', 'asc')->get()
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
                ->route('platform.menu', ["type" => $this->type, "lang" => $locale])
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
            ModalToggle::make(__('Add'))
                ->modal('addModal')
                ->method('add')
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
            Layout::table('menus', [
                TD::make('title', 'Заголовок')->render(function ($menu) {
                    return $menu->title;
                }),
                TD::make('page_id', 'Страница')->render(function ($menu) {
                    return $menu->page->title;
                }),
                TD::make('sort', 'Сортировка')->render(function ($menu) {
                    return $menu->sort;
                }),
                TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(function ($menu) {
                        return DropDown::make()
                            ->icon('options-vertical')
                            ->list([
                                ModalToggle::make(__('Edit'))
                                    ->modal('editModal')
                                    ->method('update', [$menu->id])
                                    ->asyncParameters($menu->id)
                                    ->icon('pencil'),
                                Button::make(__('Delete'))
                                    ->icon('trash')
                                    ->confirm("Запись будет удалена безвозвратно.")
                                    ->method('delete', [$menu->id])
                            ]);
                    }),
            ]),
            Layout::modal('editModal', [
                Layout::rows([
                    Input::make('fields.title')
                        ->required()
                        ->title('Заголовок'),
                    Input::make('fields.sort')
                        ->type("number")
                        ->required()
                        ->title('Сортировка'),
                    Select::make('fields.page_id')->required()
                        ->fromModel(Page::class, 'title')
                        ->title('Страница'),
                ]),
            ])->async('asyncGetData')->title('Редактировать'),
            Layout::modal('addModal', [
                Layout::rows([
                    Input::make('fields.title')
                        ->required()
                        ->title('Заголовок'),
                    Input::make('fields.sort')
                        ->type("number")
                        ->required()
                        ->title('Сортировка'),
                    Select::make('fields.page_id')->required()
                        ->fromModel(Page::class, 'title')
                        ->title('Страница'),
                ]),
            ])->title('Добавить'),
        ];
    }

    public function asyncGetData(Menu $menu): array
    {
        return [
            "fields" => $menu,
        ];
    }

    public function add($type, $lang, Request $request): void
    {
        $fields = $request->input("fields");
        $fields["type"] = $type;
        $fields["lang"] = $lang;
        Menu::create($fields);
        Toast::success('Успешно добавлено.');
    }

    public function update(Menu $menu, Request $request): void
    {
        $fields = $request->input("fields");
        $menu->update($fields);
        Toast::info('Успешно изменено.');
    }

    public function delete(Menu $menu)
    {
        $menu->delete();
        Toast::error('Успешно удалено.');
    }
}
