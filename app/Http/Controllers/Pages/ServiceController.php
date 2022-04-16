<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $arResults["services"] = [
            "title" => "Услуги Strela, г. Ялта",
            "description" => "Мы будем рады сделать Ваше пребывание в Ялте комфортным и незабываемым: экскурсии по историческим и популярным местам Крымского полуострова, трансфер с аэропорта до отеля и по Крыму – все это с радостью помогут организовать сотрудники отеля «Стрела»: тел &#43;7(987)060-10-50"
        ];
        return view('services', $arResults);
    }
}
