<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class category extends Model
{
    use HasFactory;
    use HasTranslations;
    public $translatable = ['name',"description","meta_title","meta_description"];
    public $fillable=["name","logo","description","meta_description","meta_title","meta_logo","keywords","status"];
    public $hidden=["created_at","updated_at"];
    public function images(){

        return $this->morphMany("\App\Models\image","imageable");
    }


    public function getLogoAttribute($value){

        return asset("category/".$value);

    }

    public function getMetaLogoAttribute($value){

        return asset("category/".$value);

    }
    public function foods(){

        return $this->hasMany("\App\Models\\food","category_id");
    }
}
