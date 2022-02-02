<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function localize()
    {
        return $this->morphMany(FieldLocal::class, 'localable');
    }

    public function file($newFile = false)
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function table()
    {
        return $this->morphMany('App\Models\FieldTable', 'table');
    }

    public function localClear()
    {
        $this->localize()->delete();
    }

    public function fileClear()
    {
        $this->file()->delete();
    }

    public function tableClear()
    {
        foreach ($this->table()->get() as $key => $table) {
            foreach ($table->fields()->get() as $field) {
                if($key == 0) {
                    $frame[$field->name] = $field->type;
                }
                if ($field->type == "string" || $field->type == "html") {
                    $field->localClear();
                }
                if ($field->type == "file") {
                    $field->fileClear();
                }
                if ($field->type == "table") {
                    $field->tableClear();
                }
                $field->delete();
            }
            $table->delete();
        }
        return $frame;
    }
}
