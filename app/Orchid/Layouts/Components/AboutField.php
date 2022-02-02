<?php

namespace App\Orchid\Layouts\Components;

use App\Models\Component;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Layouts\Rows;

class AboutField extends Rows
{
    public $compName = "about";
    public $fieldName = "fields.about";

    protected $title;
    public $fields = [];
    public $items = [];

    public function __construct($items)
    {
        $this->items = $items;

        $components = new Component();
        if ($component = $components->firstWhere("name", $this->compName)) {
            $this->fields = $component->localize(request('lang'));
        } else {
            $components->create(["name" => $this->compName]);
        }
    }

    protected function fields(): array
    {
        $formItems = [
            "title" => Input::make($this->fieldName . '.title')
                ->type('text')
                ->value($this->fields['title'] ?? "")
                ->title('Заголовок'),

            "picture" => Picture::make($this->fieldName . '.picture')
                ->value($this->fields['picture'] ?? "")
                ->title('Изображение'),

            "description" => Quill::make($this->fieldName . '.description')
                ->toolbar(["text", "color", "header", "list"])
                ->value($this->fields['description'] ?? "")
                ->title('Описание'),
        ];

        $resItems = [];
        foreach ($this->items as $item)
            $resItems[] = $formItems[$item];
        return $resItems;
    }
}
