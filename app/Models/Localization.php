<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localization extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'localizations';

    public function localizable()
    {
        return $this->morphTo();
    }
}
