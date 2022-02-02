<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends BaseModel
{
    use HasFactory;

    protected $guarded = [];
    private $seoItems = [
        "url" => "string",
        "title" => "string",
        "description" => "html"
    ];

    public function seo($lang = false)
    {
        $lang = $lang ?? app()->getLocale();
        $fields = $this->fields()->whereIn("name", array_keys($this->seoItems))->get();

        $arResult = collect();
        foreach ($fields as $field) {
            if ($field->type == "string") {
                $arResult->{$field->name} = $field->localize()->firstWhere('language', $lang)->string ?? $field->string;
            }
            if ($field->type == "html") {
                $arResult->{$field->name} = $field->localize()->firstWhere('language', $lang)->html ?? $field->html;
            }
            if ($field->type == "file") {
                $arResult->{$field->name} = $field->file();
            }
            if ($field->type == "table") {
                $arResult->{$field->name} = $field->table();
            }
        }
        return $arResult;
    }

    public function seoUpdate($items, $lang = false)
    {
        foreach ($this->seoItems as $seoItem => $seoType) {
            if (isset($items[$seoItem])) {
                $actualItems[$seoItem] = $items[$seoItem];
            }
        }
        $fields = $this->fields()
            ->whereIn("name", array_keys($actualItems));
        if ($fields->count() == 0) {
            $this->itemFrame($this->seoItems);
        }
        $this->itemUpdate($actualItems, $lang);
    }
}
