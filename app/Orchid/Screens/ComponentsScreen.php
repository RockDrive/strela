<?php

namespace App\Orchid\Screens;

use App\Models\CompBind;
use App\Models\Component;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\Menu;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Toast;

class ComponentsScreen extends Screen
{
    /**
     * Display header name.
     *
     * @var string
     */
    public $name = 'Компоненты';

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): array
    {
        $components = Component::get();
        return [
            "components" => $components
        ];
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): array
    {
        return [
            ModalToggle::make('Добавить')
                ->modal('editModal')
                ->method('add')
                ->icon('pencil')
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
                TD::make('name', 'Название')->render(function ($component) {
                    return ModalToggle::make($component->name)
                        ->modal('editModal')
                        ->method('update', [$component->id])
                        ->asyncParameters($component->id);
                }),
                TD::make('code', 'Код')->render(function ($component) {
                    return ModalToggle::make($component->code)
                        ->modal('editModal')
                        ->method('update', [$component->id])
                        ->asyncParameters($component->id);
                }),
                TD::make('model', 'Модель')->render(function ($component) {
                    return ModalToggle::make($component->model)
                        ->modal('editModal')
                        ->method('update', ["id" => $component->id])
                        ->asyncParameters($component->id);
                }),
                TD::make('template', 'Шаблон для редактирования')->render(function ($component) {
                    return ModalToggle::make($component->template)
                        ->modal('editModal')
                        ->method('update', [$component->id])
                        ->asyncParameters($component->id);
                }),
                TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(function ($component) {
                        return DropDown::make()
                            ->icon('options-vertical')
                            ->list([
                                ModalToggle::make(__('Edit'))
                                    ->modal('editModal')
                                    ->method('update', [$component->id])
                                    ->asyncParameters($component->id)
                                    ->icon('pencil'),
                                Button::make(__('Delete'))
                                    ->icon('trash')
                                    ->confirm("Запись будет удалена безвозвратно.")
                                    ->method('delete', [$component->id])
                            ]);
                    }),
            ]),
            Layout::modal('editModal', [
                Layout::rows([
                    Input::make('fields.name')
                        ->type('text')
                        ->required()
                        ->title('Название'),
                    Input::make('fields.code')
                        ->type('text')
                        ->required()
                        ->title('Код'),
                    Select::make('fields.model')
                        ->options(
                            $this->getObjects(app_path() . "/Models/Components", "\App\Models\Components\\")
                        )
                        ->required()
                        ->title('Модель'),
                    Select::make('fields.template')
                        ->options(
                            $this->getObjects(app_path() . "/Orchid/Layouts/Components", "\App\Orchid\Layouts\Components\\")
                        )
                        ->required()
                        ->title('Шаблон'),
                ]),
            ])->async('asyncGetData')->title('Редактирование компонента'),
        ];
    }

    public function asyncGetData(Component $component): array
    {
        return [
            "fields" => $component,
        ];
    }

    public function add(Request $request): void
    {
        $fields = $request->input("fields");
        Component::create($fields);
        Toast::success('Компонент успешно добавлен.');
    }

    public function update(Component $component, Request $request): void
    {
        $fields = $request->input("fields");
        $component->update($fields);
        Toast::info('Компонент успешно изменен.');
    }

    public function delete(Component $component)
    {
        $component->delete();
        Toast::error('Компонент успешно удален.');
    }

    private function getObjects($path, $use)
    {
        $out = [];
        $results = scandir($path);
        foreach ($results as $result) {
            if ($result === '.' or $result === '..') continue;
            $filename = $use . $result;
            if (is_dir($filename)) {
                $out = array_merge($out, $this->getObjects($filename, $use));
            } else {
                $object = substr($filename, 0, -4);
                $out[$object] = $object;
            }
        }
        return $out;
    }
}
