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


}

