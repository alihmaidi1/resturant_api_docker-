<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;

    public $fillable=["url","imageable_id","imageable_type","created_at","updated_at"];
    public $hidden=["created_at","updated_at"];

    public function imageable(){

        return $this->morphTo();
    }


    public function getUrlAttribute($value){

        if($this->imageable_type=="app\Models\category"){

            return asset("category/".$value);
        }else if($this->imageable_type=="app\Models\\food"){

            return asset("food/".$value);
        }
    }
}
