<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storehouse extends Model
{
    use HasFactory;

    public $fillable=["name","address","isFull","resturant_id"];
    public $hidden=["created_at","updated_at"];

    public function getIsFullAttribute($value){


        return ($value)?trans("admin.yes"):trans("admin.no");

    }

    public function resturant(){

        return $this->belongsTo("\App\Models\\resturant","resturant_id");
    }

}
