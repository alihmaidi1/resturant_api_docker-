<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resturant extends Model
{

    use HasFactory;

    public $fillable=["address","name","rate"];
    public $hidden=["created_at","updated_at"];


    public function employees(){

        return $this->hasMany("App\Models\\employee","resturant_id");
    }

    public function tables(){


        return $this->hasMany("\App\Models\\table","resturant_id");
    }

    public function storehouses(){

        return $this->hasMany("\App\Models\storehouse","resturant_id");

    }


    public function foods(){


        return $this->belongsToMany("\App\Models\\food","\App\Models\\resturant_food","food_id","resturant_id");

    }



    public function chats(){

        return $this->hasMany("\App\Models\chat","resturant_id");
    }


    public function admins(){

        return $this->hasMany(admin::class,"resturant_id");
    }


}

