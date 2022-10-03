<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishlist extends Model
{
    use HasFactory;

    public $fillable=["user_id","resturant_food_id"];

    public $hidden=["created_at","updated_at","user_id","restrant_food_id"];


    public function user(){


        return $this->belongsTo("\App\Models\user","user_id");
    }


    public function resturantfood(){

        return $this->belongsTo("\App\Models\\resturant_food","resturant_food_id");
    }
}
