<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $guarded = [];
    private $seoItems = [
        "url" => "string",
        "title" => "string",
        "description" => "html"
    ];


    public function components()
    {
        return $this->hasMany(CompBind::class);
    }

    public function seo()
    {
        return $this->hasMany(Seo::class);
    }

    public function getSeo($lang = false)
    {
        $lang = $lang ?? app()->getLocale();
        $seo = $this->seo()->firstWhere("lang", $lang);
        if(!$seo) {
            $seo = $this->seo()->firstWhere("lang", config('app.fallback_locale'));
            $seo->url = "/" . $lang . $seo->url;
        }
        return $seo;
    }
}
