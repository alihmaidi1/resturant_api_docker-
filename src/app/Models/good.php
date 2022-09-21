<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class good extends Model
{
    use HasFactory,HasTranslations;
    public $fillable=["name"];
    public $hidden=["created_at","updated_at"];
    public $translatable=["name"];

    public function storehouses(){


        return $this->belongsToMany("\App\Models\storehouse","\App\Models\storeGood","storehouse_id","good_id");
    }

}
