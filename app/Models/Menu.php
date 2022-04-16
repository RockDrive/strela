<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }

    public function getMenu($type, $lang = false)
    {
        $lang = ($lang) ? $lang : config('app.locale');

        $arMenu = $this->where("type", $type)->where("lang", $lang);
        if($arMenu->count() == 0) {
            $mainMenu = Menu::where("type", $type)->where("lang", config('app.fallback_locale'))->get();
            foreach ($mainMenu as $menu) {
                $this->create([
                    "lang" => $lang,
                    "type" => $menu["type"],
                    "title" => $menu["title"],
                    "sort" => $menu["sort"],
                    "page_id" => $menu["page_id"],
                ]);
            }
        }
        return $arMenu;
    }
}
