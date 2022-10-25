<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class role extends Model
{
    use HasFactory;
    use HasTranslations;

    public $fillable=["name","permssion"];
    public $hidden=["created_at","updated_at"];
    public $translatable = ['name'];

    public function admins(){
        return $this->hasMany("App\Models\admin","role_id");
    }



    public function getPermssionAttribute($value){
        return json_decode($value);
    }

}
