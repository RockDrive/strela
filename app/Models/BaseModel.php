<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fields()
    {
        return $this->morphMany('App\Models\Field', 'fieldable');
    }

    public function items($lang = false)
    {
        $lang = $lang ?? app()->getLocale();
        $fields = $this->fields()->get();

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

    public function itemFrame($frames)
    {
        $items = collect();
        $fields = $this->fields();
        foreach ($frames as $name => $type) {
            if ($type == "table") {
                $items[$name] = $fields->create([
                    "name" => $name,
                    "type" => $type
                ])->table()->create();
            } else {
                $items[$name] = $fields->create(["name" => $name, "type" => $type]);
            }
        }
        return $items;
    }

    public function itemUpdate($items, $lang = false)
    {
        $fields = $this->fields()
            ->whereIn("name", array_keys($items))
            ->get();
        foreach ($fields as $field) {
            $value = $items[$field->name];
            if ($field->type == "string") {
                if ($lang && $lang != config('app.locale')) {
                    $localItem = $field->localize()->firstWhere('language', $lang);
                    if ($localItem) {
                        $localItem->update(["string" => $value]);
                    } else {
                        $field->localize()->create(["language" => $lang, "string" => $value]);
                    }
                } else {
                    $field->update(["string" => $value]);
                }
            }
            if ($field->type == "html") {
                if ($lang && $lang != config('app.locale')) {
                    $localItem = $field->localize()->firstWhere('language', $lang);
                    if ($localItem) {
                        $localItem->update(["html" => $value]);
                    } else {
                        $field->localize()->create(["language" => $lang, "html" => $value]);
                    }
                } else {
                    $field->update(["html" => $value]);
                }
            }
            if ($field->type == "file") {
                $field->file($value);
            }
            if ($field->type == "table") {
                $frame = $field->tableClear();
                foreach ($value as $tableItems) {
                    $table = $field->table()->create();
                    $table->itemFrame($frame);
                    $table->itemUpdate($tableItems, $lang);
                }
            }
        }
    }
}
