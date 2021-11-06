<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        $arResults["rooms"] = [
            "title" => "Strela, г. Ялта",
            "description" => "Предлагаем Вашему вниманию комфортабельные номера отеля «Стрела», все номера оборудованы кухней и оформлены в светлых естественных оттенках для уютного проживания."
        ];
        return view('rooms', $arResults);
    }
}
