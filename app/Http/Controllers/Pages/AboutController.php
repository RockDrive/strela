<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Cropper;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Matrix;
use Orchid\Support\Facades\Layout;
use App\Orchid\Layouts\Components\AboutField;
use App\Orchid\Layouts\Components\ContactField;
use App\Orchid\Layouts\Components\RoomsField;
use App\Orchid\Layouts\Components\SliderField;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        $arResults["about"] = [
            "title" => "отель \"Стрела\" Крым Ялта",
            "src" => asset('img/og-image.png'),
            "text" => "Отель «Стрела» - это современное четырехэтажное здание, расположен отель в зеленом, тихом районе курортного города Ялта, в пешей доступности к морю. Наш отель располагает 15 комфортабельными номерами, в каждом номере удобная мебель, просторный санузел с душевой кабиной, феном и новейшей сантехникой, кондиционер, сейф, Wi Fi, удобный кухонный уголок оборудован холодильником, варочной поверхностью и всей необходимой посудой. Гостям предложим халаты, тапочки, гигиенические принадлежности, утюг и гладильную доску. Номера разных категорий и круглосуточной стойкой регистрации. Просторные светлые холлы на этажах, уютный зеленый дворик отеля, внимательный персонал, всегда готовый ответить на любой вопрос - все это создает атмосферу домашнего уюта в сочетании с современным комфортом.",
        ];
        $arResults["accomm"] = [
            "title" => "Условия проживания",
            "description" => "Данные правила проживания в отеле являются общими и могут варьироваться от типа номера. Пожалуйста проверьте описание Вашего номера.",
            "items" => [
                ["key" => "Регистрация заезда", "value" => "14:00"],
                ["key" => "Регистрация выезда", "value" => "12:00"],
                ["key" => "Отмена бронирования", "value" => "Отмена бронирования возможна за 24 часа до заезда."],
                ["key" => "Меры противодействия Covid 19", "value" => "Отель «Стрела» заботится о безопасности гостей и принимает меры по усилению санитарного режима. В целях противодействия распространения короновирусной инфекции (COVID – 19) просим Вас соблюдать следующие правила поведения:
                        1. Соблюдать социальную дистанцию от 1.5 метров.
                        2. Носить маски и перчатки о общих зонах.
                        3. Придерживаться правой стороны при перемещении внутри отеля (в коридорах, лестницах).
                        4. При входе/выходе из номера мойте руки с мылом не менее 20 сек. Порадуйте их чистотой.
                        5. Используйте антисептические средства (есть на стойке ресепшн).
                        6. Осуществлять оплату по безналичному расчету.
                        7. В номерах отеля при заезде и после выезда гостей проводится регулярное проветривание, а также дополнительная дезинфекция всех поверхностей.
                        8. В случае недомогания и появления симптомов Covid 19, просим Вас само изолироваться и незамедлительно сообщит администратору, который проконсультирует и представит градусник для измерения температуры, а также поможет с вызовом врача."],
            ]
        ];
        $arResults["conditions"] = [
            "title" => "Правила и условия",
            "text" => "Процедура оформления бронирования является абсолютно безопасной.
            Все личные сведения находятся в зашифрованном виде, и их обработка происходит в безопасном режиме.
            Персональные сведения будут использованы только для оформления бронирования."
        ];
        return view('about', $arResults);
    }

    public static function admin($lang, $items)
    {
            return Layout::accordion([
                "Баннер" => Layout::rows([
                    Matrix::make('slides')
                        ->columns([
                            'Изображение' => 'img',
                            'Изображение (моб)' => 'img_mob',
                            'Сортировка' => 'sort'
                        ])
                        ->fields([
                            'img' => Cropper::make('img'),
                            'img_mob' => Cropper::make('img_mob'),
                            'sort' => Input::make()->type('number'),
                        ]),
                ]),
//                "Контакты" => new AboutField(),
                "Номера" => new RoomsField(),
                "Контакты" => new ContactField(),
            ]);
    }
}
