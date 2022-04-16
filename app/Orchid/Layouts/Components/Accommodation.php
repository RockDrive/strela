<?php

namespace App\Orchid\Layouts\Components;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Layouts\Rows;

class Accommodation extends Rows
{
    /**
     * Used to create the title of a group of form elements.
     *
     * @var string|null
     */
    protected $title;

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): array
    {
        return [
            Input::make('fields.title')
                ->type('text')
                ->title('Заголовок'),
            Quill::make('fields.description')
                ->toolbar(["text", "color", "header", "list"])
                ->title('Описание'),
            Matrix::make('array.timetable')
                ->columns([
                    'Название' => 'title',
                    'Описание' => 'description',
                ])
                ->fields([
                    'title' => Input::make('title'),
                    'description' => Quill::make('fields.description')
                        ->toolbar(["text", "color", "header", "list"]),
                ]),
        ];
    }
}
