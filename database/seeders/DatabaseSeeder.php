<?php

namespace Database\Seeders;

use App\Models\Component;
use App\Models\File;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Template;
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

        // Страницы
        $arPages = [
            ["id" => 1,"title" => "Главная", "template" => "home", "index" => 1, "url" => "/"],
            ["id" => 2,"title" => "Об отеле", "template" => "about", "index" => 0, "url" => "about"],
            ["id" => 3,"title" => "Номера", "template" => "rooms", "index" => 0, "url" => "rooms"],
            ["id" => 4,"title" => "Услуги", "template" => "services", "index" => 0, "url" => "services"],
            ["id" => 5,"title" => "Фотогалерея", "template" => "photos", "index" => 0, "url" => "photos"],
            ["id" => 6,"title" => "Контакты", "template" => "contacts", "index" => 0, "url" => "contacts"],
            ["id" => 7,"title" => "Бронирование", "template" => "booking", "index" => 0, "url" => "booking"],
            ["id" => 8,"title" => "Оплата и реквизиты", "template" => "requisites", "index" => 0, "url" => "requisites"],
        ];
        foreach ($arPages as $arPage) {
            Page::create([
                "title" => $arPage["title"],
                "template" => $arPage["template"],
                "index" => $arPage["index"]
            ])->seoUpdate(["url" => $arPage["url"]]);
        }

        // Меню
        Menu::create(["type" => "main", "title" => "Об отеле", "sort" => 100, "page_id" => 2]);
        Menu::create(["type" => "main", "title" => "Номера", "sort" => 100, "page_id" => 3]);
        Menu::create(["type" => "main", "title" => "Услуги", "sort" => 100, "page_id" => 4]);
        Menu::create(["type" => "main", "title" => "Фотогалерея", "sort" => 100, "page_id" => 5]);
        Menu::create(["type" => "main", "title" => "Контакты", "sort" => 100, "page_id" => 6]);
        Menu::create(["type" => "main", "title" => "Бронирование", "sort" => 100, "page_id" => 7]);


        // \App\Models\User::factory(10)->create();

//        $components = Component::create(["name" =>  "slider"]);
//        $compFrame = $components->itemFrame([
//            "name" => "string",
//            "description" => "html",
//            "image" => "file",
//            "slides" => "table"
//        ]);
//        $compFrame["slides"]->itemFrame([
//            "name" => "string",
//            "image" => "file"
//        ]);
//        $components->itemUpdate([
//            "name" => "Название",
//            "description" => "Описание",
//            "image" => "FileObject",
//            "slides" => [
//                ["name" => "слайд 1", "image" => "FileObject"],
//                ["name" => "слайд 2", "image" => "FileObject"],
//            ]
//        ], "ru");
    }
}
