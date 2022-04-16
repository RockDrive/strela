<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Компоненты
        $components = [
            "Banner" => "Баннер",
            "About" => "Об отеле",
            "RoomAnons" => "Номера на главной",
            "Room" => "Номера",
            "Contact" => "Контакты",
            "Map" => "Карта",
            "Accommodation" => "Условия проживания",
            "Condition" => "Правила и условия",
            "Service" => "Услуги",
            "Offer" => "Предлагаем Вам",
            "Equipment" => "Оснащение",
            "Photo" => "Фотогалерея",
            "Booking" => "Бронирование",
            "Payment" => "Оплата и реквизиты",
            "BankPay" => "Банковские реквизиты",
            "PayMethod" => "Способы оплаты",
        ];
        foreach ($components as $component => $name) {
            Component::create([
                "name" => $name,
                "code" => $component,
                "model" => "\App\Models\Components\\" . $component,
                "template" => "\App\Orchid\Layouts\Components\\" . $component,
            ]);
        }

        // Страницы
        $arPages = [
            ["id" => 1,"title" => "Главная", "template" => "home", "index" => 1, "url" => "/", "components" => ["Banner", "About", "RoomAnons", "Contact", "Map"]],
            ["id" => 2,"title" => "Об отеле", "template" => "about", "index" => 0, "url" => "/about", "components" => ["About", "Accommodation", "Condition"]],
            ["id" => 3,"title" => "Номера", "template" => "rooms", "index" => 0, "url" => "/rooms", "components" => ["Room"]],
            ["id" => 4,"title" => "Услуги", "template" => "services", "index" => 0, "url" => "/services", "components" => ["Service", "Offer", "Equipment"]],
            ["id" => 5,"title" => "Фотогалерея", "template" => "photos", "index" => 0, "url" => "/photos", "components" => ["Photo"]],
            ["id" => 6,"title" => "Контакты", "template" => "contacts", "index" => 0, "url" => "/contacts", "components" => ["Contact", "Map"]],
            ["id" => 7,"title" => "Бронирование", "template" => "booking", "index" => 0, "url" => "/booking", "components" => ["Booking"]],
            ["id" => 8,"title" => "Оплата и реквизиты", "template" => "requisites", "index" => 0, "url" => "/requisites", "components" => ["Payment", "BankPay", "PayMethod"]],
        ];
        foreach ($arPages as $arPage) {
            $page = Page::create([
                "title" => $arPage["title"],
                "template" => $arPage["template"],
                "index" => $arPage["index"]
            ]);
            $page->seo()->create([
                "lang" => config('app.fallback_locale'),
                "url" => $arPage["url"],
                "title" => $arPage["title"],
            ]);
            foreach ($arPage["components"] as $component) {
                $page->components()->create([
                    "name" => $components[$component],
                    "component_id" => Component::firstWhere("code", $component)->id
                ])->fields()->create(["lang" => config('app.fallback_locale')]);
            }
        }

        // Меню
        Menu::create(["lang" => config('app.fallback_locale'), "type" => "main", "title" => "Об отеле", "sort" => 100, "page_id" => 2]);
        Menu::create(["lang" => config('app.fallback_locale'), "type" => "main", "title" => "Номера", "sort" => 100, "page_id" => 3]);
        Menu::create(["lang" => config('app.fallback_locale'), "type" => "main", "title" => "Услуги", "sort" => 100, "page_id" => 4]);
        Menu::create(["lang" => config('app.fallback_locale'), "type" => "main", "title" => "Фотогалерея", "sort" => 100, "page_id" => 5]);
        Menu::create(["lang" => config('app.fallback_locale'), "type" => "main", "title" => "Контакты", "sort" => 100, "page_id" => 6]);
        Menu::create(["lang" => config('app.fallback_locale'), "type" => "main", "title" => "Бронирование", "sort" => 100, "page_id" => 7]);

        // Привязка компонентов к странице

    }
}
