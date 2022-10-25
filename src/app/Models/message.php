<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    use HasFactory;
    public $fillable=["chat_id","content","sendBy","created_at"];
    public $hiiden=["chat_id","updated_at"];


    public function chat(){

        return $this->belongsTo("\App\Models\chat","chat_id");
    }


    public function getSendByAttribute($value){

        return ($value==0)? "user":"resturant";

    }
}
