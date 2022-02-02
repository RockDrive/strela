<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalizeModel extends Model
{
    use HasFactory;

    public function localization($locale = false)
    {
        return $this->morphMany(Localization::class, 'lozalizable')
            ->where('language', $locale ?? app()->getLocale());
    }

    public function localUpdate($fields, $locale)
    {
        foreach ($fields as $key => $value) {
            $locItems = $this->localization($locale)
                ->where("field", $key);
            if ($locItems->count() > 0) {
                $locItems->update(["value" => $value]);
            } else {
                $locItems->create(["language" => $locale, "field" => $key, "value" => $value]);
            }
        }
        return $locItems;
    }

    public function localize($locale = false)
    {
        $locItems = $this->localization($locale)
            ->get()
            ->pluck('value', 'field');
        return $locItems;
    }

    public function getLocalizeAttribute()
    {
        return $this->localize();
    }
}
