<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    use HasFactory;

    public $fillable=["logo","where_show","status","url","rank"];

    public $hidden=["created_at","updated_at"];

    public function getLogoAttribute($value){

        return asset("banner/".$value);

    }
}
