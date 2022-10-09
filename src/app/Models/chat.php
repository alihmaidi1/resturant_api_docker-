<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    use HasFactory;

    public $fillable=["user_id","resturant_id"];

    public $hidden=["created_at","updated_at","user_id","resturant_id"];


    public function user(){

        return $this->belongsTo("\App\Models\user","user_id");

    }

    public function resturant(){

        return $this->belongsTo("\App\Models\\resturant","resturant_id");
    }


    public function messages(){

        return $this->hasMany("\App\Models\message","chat_id");
    }
}
