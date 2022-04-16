<?php

namespace App\Orchid\Layouts\Components;

use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Layouts\Rows;

class Banner extends Rows
{
    protected function fields(): array
    {
        return [
            Matrix::make('array.slides')
                ->columns([
                    'Изображение' => 'img',
                ])
                ->fields([
                    'img' => Picture::make('img')->required()->targetId(),
                ])
        ];
    }
}
