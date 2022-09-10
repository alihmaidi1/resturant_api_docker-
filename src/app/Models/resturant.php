<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class resturant extends Model
{

    use HasFactory;
    use HasTranslations;

    public $fillable=["address","name","rate"];
    public $translatable = ['name'];
    public $hidden=["created_at","updated_at"];

    public function getNameAttribute($value){

        return $value;
    }


    public function employees(){

        return $this->hasMany("App\Models\\employee","resturant_id");
    }


}

