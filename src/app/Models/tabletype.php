<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class tabletype extends Model
{
    use HasFactory,HasTranslations;

    public $hidden=["created_at","updated_at"];
    public $translatable = ['name'];
    public $fillable=["name","price","currency_id"];

    public function currency(){

        return $this->belongsTo("\App\Models\currency","currency_id");

    }

}
