<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    use HasFactory;

    public $fillable=["logo","status","rank"];
    public $hidden=["created_at","updated_at"];

    public function getLogoAttribute($value){

        return asset("slider/".$value);
    }

}
