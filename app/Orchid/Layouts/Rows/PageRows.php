<?php

namespace App\Orchid\Layouts\Rows;

use App\Models\Component;
use App\Orchid\Layouts\Components\About;
use App\Orchid\Layouts\Components\ContactField;
use App\Orchid\Layouts\Components\RoomsField;
use App\Orchid\Layouts\Components\Banner;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Screen\Fields\Picture;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Layouts\Rows;
use Orchid\Support\Facades\Layout;

class PageRows
{

    public static function home()
    {
        return Layout::tabs([
//            "Баннер" => new SliderField(["slides"]),
            "О нас" => new About(["title", "picture", "description"]),
//            "Номера" => new RoomsField(),
//            "Контакты" => new ContactField(),
        ]);
    }
}
