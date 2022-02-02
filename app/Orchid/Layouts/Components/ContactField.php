<?php

namespace App\Orchid\Layouts\Components;

use App\Models\Component;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Layouts\Rows;

class ContactField extends Rows
{
    public $compName = "contacts";
    public $fieldName = "fields.contacts";

    protected $title;
    public $fields = [];
    public $items = [];

    public function __construct($items)
    {
        $this->items = $items;

        $components = new Component();
        if ($component = $components->firstWhere("name", $this->compName)) {
            $this->fields = $component->localize;
        } else {
            $components->create(["name" => $this->compName]);
        }
    }

    protected function fields(): array
    {
        return [
            Matrix::make('slides')
                ->columns([
                    'Название' => 'title',
                    'Изображение' => 'img',
                    'Сортировка' => 'sort'
                ])
                ->fields([
                    'title' => Input::make(),
                    'img' => Cropper::make('img'),
                    'sort' => Input::make()->type('number'),
                ]),
        ];
    }
}
