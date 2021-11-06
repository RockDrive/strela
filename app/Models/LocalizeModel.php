<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalizeModel extends Model
{
    use HasFactory;

    public function localization()
    {
        return $this->morphOne('App\Models\Localization', 'lozalizable');
    }

    public function getLocalizeAttribute()
    {
        if(app()->getLocale() == "ru") {
            return $this->attributes;
        } else {
            $locItems = $this->localization()
                ->where('language', app()->getLocale())
                ->get()
                ->pluck('value', 'field');
            return $locItems;
        }
    }
}
