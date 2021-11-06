<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends LocalizeModel
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'sort',
        'pageable'
    ];

    public function page()
    {
        return $this->belongsTo(Page::class, 'pageable_id');
    }
}
