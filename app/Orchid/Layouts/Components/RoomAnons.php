<?php

namespace App\Orchid\Layouts\Components;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Layouts\Rows;

class RoomAnons extends Rows
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
            Input::make('fields.btn')
                ->type('text')
                ->title('Кнопка'),
            Matrix::make('array.rooms')
                ->columns([
                    'Название' => 'name',
                    'Изображение' => 'img',
                ])
                ->fields([
                    'name' => Input::make(),
                    'img' => Picture::make('img')->required()->targetId(),
                ])
        ];
    }
}
