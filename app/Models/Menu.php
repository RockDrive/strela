<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends BaseModel
{
    use HasFactory;

    protected $guarded = [];

    public function page()
    {
        return $this->belongsTo(Page::class, 'page_id');
    }
}
