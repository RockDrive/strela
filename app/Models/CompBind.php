<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CompBind extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function component()
    {
        return $this->belongsTo(Component::class, "component_id");
    }

    public function fields()
    {
        return new $this->component->model();
    }

    public function getFields($lang = false)
    {
        $lang = $lang ?? app()->getLocale();
        $fields = $this->fields()->firstWhere("lang", $lang);
        if (!$fields) {
            $fields = $this->fields()->firstWhere("lang", config('app.fallback_locale'));
        }
        $fields = $fields->toArray();
        $result["fields"] = $fields;
        foreach ($fields as $name => $field) {
            if ($this->isJson($field)) {
                $result["array"][$name] = json_decode($field, true);
            }
        }
        return $result;
    }

    function isJson($string)
    {
        return ((is_string($string) &&
            (is_object(json_decode($string)) ||
                is_array(json_decode($string))))) ? true : false;
    }
}
