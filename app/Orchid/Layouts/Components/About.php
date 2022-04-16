<?php

namespace App\Orchid\Layouts\Components;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Layouts\Rows;

class About extends Rows
{

    protected function fields(): array
    {
        return [
            Input::make('fields.title')
                ->type('text')
                ->title('Заголовок'),
            Input::make('fields.title_home')
                ->type('text')
                ->title('Заголовок  на главной'),
            Picture::make('fields.picture')
                ->title('Изображение')->targetId(),

            Quill::make('fields.description')
                ->toolbar(["text", "color", "header", "list"])
                ->title('Описание'),
            Input::make('fields.more')
                ->type('text')
                ->title('Подробнее'),
        ];
    }
}
