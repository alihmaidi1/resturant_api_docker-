<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;


    public $fillable=["code","table_id","name","status","start","end","user_id"];

    public $hidden=["created_at","updated_at"];

    public function table(){

        return $this->belongsTo("\App\Models\\table","table_id");
    }


    public function user(){

        return $this->belongsTo("App\Models\user","user_id");
    }

}
