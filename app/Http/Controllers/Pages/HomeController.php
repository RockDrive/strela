<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index($url)
    {
        return $url;
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
}
