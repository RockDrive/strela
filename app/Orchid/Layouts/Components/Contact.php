<?php

namespace App\Orchid\Layouts\Components;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Group;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Layouts\Rows;

class Contact extends Rows
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
            Input::make('fields.address')
                ->type('text')
                ->title('Адрес'),
            Input::make('fields.whatsapp')
                ->mask('+7 (999) 999-9999')
                ->title('WhatsApp'),
            Input::make('fields.viber')
                ->mask('+7 (999) 999-9999')
                ->title('Viber'),
            Input::make('fields.instagram')
                ->type('url')
                ->title('Instagram'),
            Matrix::make('array.phones')
                ->columns([
                    'Телефон' => 'phone',
                    'Описание' => 'name',
                ])
                ->fields([
                    'phone' => Input::make('phone')->mask('+7 (999) 999-9999'),
                    'name' => Input::make('name'),
                ]),
            Matrix::make('array.emails')
                ->columns([
                    'E-mail' => 'email',
                    'Описание' => 'name',
                ])
                ->fields([
                    'email' => Input::make('email')->type('email'),
                    'name' => Input::make('name'),
                ]),
            Quill::make('fields.booking')
                ->toolbar(["text", "color", "header", "list"])
                ->title('Бронирование'),
            Input::make('fields.booking_title')
                ->type('text')
                ->title('Кнопка бронирования'),
//            Quill::make('fields.description')
//                ->toolbar(["text", "color", "header", "list"])
//                ->title('Описание местоположения'),
            Input::make('fields.map_title')
                ->type('text')
                ->title('Заголовок карты'),
            Input::make('fields.coordinate_title')
                ->type('text')
                ->title('Заголовок координаты'),
            Group::make([
                Input::make('fields.map_lat_title')
                    ->type('text')
                    ->title('Широта (lat)'),
                Input::make('fields.map_lat')
                    ->type('text')
                    ->title('Координата'),
            ]),
            Group::make([
                Input::make('fields.map_lng_title')
                    ->type('text')
                    ->title('Долгота (long)'),
                Input::make('fields.map_lng')
                    ->type('text')
                    ->title('Координата'),
            ]),
        ];
    }
}
