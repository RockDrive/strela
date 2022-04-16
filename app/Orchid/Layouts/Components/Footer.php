<?php

namespace App\Orchid\Layouts\Components;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Layouts\Rows;

class Footer extends Rows
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
            Input::make('fields.copyright_hotel')
                ->type('text')
                ->title('Копирайт - отель')
                ->required(),
            Input::make('fields.copyright_official')
                ->type('text')
                ->title('Копирайт - официал')
                ->required(),
            Input::make('fields.menu_title')
                ->type('text')
                ->title('Название меню')
                ->required(),
        ];
    }
}
