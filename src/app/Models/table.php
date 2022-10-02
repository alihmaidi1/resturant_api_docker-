<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class table extends Model
{
    use HasFactory,HasTranslations;
    public $fillable=["name","description","person_number","status","resturant_id","type_id"];
    public $hidden=["created_at","updated_at"];
    public $translatable=["description"];
    public function resturant(){

        return $this->belongsTo("\App\Models\\resturant","resturant_id");
    }

    public function type(){

        return $this->belongsTo("\App\Models\\tabletype","type_id");
    }


    public function getStatusAttribute($value){

        return ($value)?trans("admin.free"):trans("admin.busy");

    }


    public function reservations(){

        return $this->hasMany("\App\Models\\reservation","table_id");

    }



}
