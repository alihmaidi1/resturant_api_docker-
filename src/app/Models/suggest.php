<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suggest extends Model
{
    use HasFactory;


    public $fillable=["description","user_id"];



    public $hidden=["created_at","updated_at","user_id"];


    public function user(){


        return $this->belongsTo("\App\Models\user","user_id");

    }

}
