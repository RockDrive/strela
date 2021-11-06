<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    use HasFactory;

    protected $fillable = [
        'field',
        'language',
        'value',
        'lozalizable'
    ];

    protected $table = 'localizations';

    public function localizable()
    {
        return $this->morphTo();
    }
}
