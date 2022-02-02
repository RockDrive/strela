<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use League\Flysystem\Adapter\Local;

class PageController extends Controller
{

    public $locale;

    public function __construct()
    {
        $this->locale = Lang::getLocale();
    }

    public function test()
    {
        $S = 10;
        $p = 0.06;
        for ($i = 1; $i <= 500; $i++) {
            $S += round($S*$p, 2);
        }
        return $S;
    }

    public function home()
    {
        $arResults["slides"] = [
            ["src" => asset('img/desktop-banner.jpg'), "src_mob" => asset('img/mob-banner.jpg')],
            ["src" => asset('img/desktop-banner.jpg'), "src_mob" => asset('img/mob-banner.jpg')],
            ["src" => asset('img/desktop-banner.jpg'), "src_mob" => asset('img/mob-banner.jpg')],
            ["src" => asset('img/desktop-banner.jpg'), "src_mob" => asset('img/mob-banner.jpg')],
            ["src" => asset('img/desktop-banner.jpg'), "src_mob" => asset('img/mob-banner.jpg')],
        ];
        $arResults["about"] = [
            "title" => "Номера и цены гостиницы Стрела в Ялте",
            "src" => asset('img/og-image.png'),
            "text" => "Отель «Стрела» - это современное четырехэтажное здание, расположен отель в зеленом, тихом районе курортного города Ялта, в пешей доступности к морю. Наш отель располагает 15 комфортабельными номерами, в каждом номере удобная мебель, просторный санузел с душевой кабиной, феном и новейшей сантехникой, кондиционер, сейф, Wi Fi, удобный кухонный уголок оборудован холодильником, варочной поверхностью и всей необходимой посудой. Гостям предложим хала...",
        ];
        $arResults["rooms"] = [
            "title" => "Номера",
        ];
        $arResults["contacts"] = [
            "title" => "Контакты",
            "address" => "Республика Крым, г. Ялта, ул. Вергасова, 7",
            "phone" => "+79870601050",
            "phone_wa" => "+79789610062",
            "phone_vi" => "+79789610062",
            "mail" => "hotelstrela@yandex.ru"
        ];
        return view('home', $arResults);
    }

    public function about()
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
                ["key" => "Регистрация заезда",  "value" => "14:00"],
                ["key" => "Регистрация выезда",  "value" => "12:00"],
                ["key" => "Отмена бронирования",  "value" => "Отмена бронирования возможна за 24 часа до заезда."],
                ["key" => "Меры противодействия Covid 19",  "value" => "Отель «Стрела» заботится о безопасности гостей и принимает меры по усилению санитарного режима. В целях противодействия распространения короновирусной инфекции (COVID – 19) просим Вас соблюдать следующие правила поведения:
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

    public function rooms()
    {
        $arResults["rooms"] = [
            "title" => "Strela, г. Ялта",
            "description" => "Предлагаем Вашему вниманию комфортабельные номера отеля «Стрела», все номера оборудованы кухней и оформлены в светлых естественных оттенках для уютного проживания."
        ];
        return view('rooms', $arResults);
    }

    public function services()
    {
        $arResults["services"] = [
            "title" => "Услуги Strela, г. Ялта",
            "description" => "Мы будем рады сделать Ваше пребывание в Ялте комфортным и незабываемым: экскурсии по историческим и популярным местам Крымского полуострова, трансфер с аэропорта до отеля и по Крыму – все это с радостью помогут организовать сотрудники отеля «Стрела»: тел &#43;7(987)060-10-50"
        ];
        return view('services', $arResults);
    }

    public function photos()
    {
        return view('photos');
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function booking()
    {
        return view('booking');
    }

    public function requisites()
    {
        return view('requisites');
    }
}
