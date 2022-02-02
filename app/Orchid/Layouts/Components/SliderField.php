<?php

namespace App\Orchid\Layouts\Components;

use App\Models\Component;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Facades\Layout;

class SliderField extends Rows
{
    public $compName = "slider";
    public $fieldName = "fields.slider";

    protected $title;
    public $fields = [];
    public $items = [];

    public function __construct($items)
    {
        $this->items = $items;

        $components = new Component();
        if ($component = $components->firstWhere("name", $this->compName)) {
            $this->fields = $component->items(request('lang'));
        } else {
            $component = $components->create(["name" => $this->compName]);
            $compFrame = $component->itemFrame([
                "slides" => "table"
            ]);
            $compFrame["slides"]->itemFrame([
                "img" => "file",
                "img_mob" => "file",
                "number" => "string"
            ]);
        }

        $component->itemUpdate([
            "slides" => [
                ["img" => "FileObject", "img_mob" => "FileObject", "sort" => 100],
                ["img" => "FileObject", "img_mob" => "FileObject", "sort" => 200],
            ]
        ], "ru");
        $this->fields = $component->items(request('lang'));

        dd($this->fields);

    }

    protected function fields(): array
    {
        $formItems = [
            "slides" => Matrix::make('slides')
                ->columns([
                    'Изображение' => $this->fieldName . '.img',
                    'Изображение (моб)' => $this->fieldName . '.img_mob',
                    'Сортировка' => $this->fieldName . '.sort'
                ])
                ->fields([
                    $this->fieldName . '.img' => Cropper::make('img'),
                    $this->fieldName . '.img_mob' => Cropper::make('img_mob'),
                    $this->fieldName . '.sort' => Input::make()->type('number'),
                ]),
        ];

        $resItems = [];
        foreach ($this->items as $item)
            $resItems[] = $formItems[$item];
        return $resItems;
    }
}
