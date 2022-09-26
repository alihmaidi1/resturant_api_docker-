<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class food extends Model
{
    use HasFactory,HasTranslations;

    public $fillable=["name","thumbnail","description","tag","meta_title","meta_description","meta_logo","meta_keyword","category_id"];
    public $hidden=["created_at","updated_at","category_id"];
    public $translatable=["name","description","meta_title","meta_description"];
    public function getThumbnailAttribute($value){

        return asset("food/".$value);
    }


    public function resturants(){


        return $this->belongsToMany("\App\Models\\resturant","\App\Models\\resturant_food","resturant_id","food_id");


    }


    public function getMetaLogoAttribute($value){

        return asset("food/".$value);
    }
    public function category(){

        return $this->belongsTo("\App\Models\category","category_id");
    }

    public function images(){

        return $this->morphMany("\App\Models\image","imageable");
    }


}
