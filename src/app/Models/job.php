<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class job extends Model
{

    use HasFactory,HasTranslations;
    public $fillable=["name","salary"];
    public $hidden=["created_at","updated_at"];
    public $translatable = ['name'];

    public function employees(){

        return $this->hasMany("App\Models\\employee","job_id");

    }


    public function currency(){

        return $this->belongsTo("App\Models\currency","currency_id");

    }


}
