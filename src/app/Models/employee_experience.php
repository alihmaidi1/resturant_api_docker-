<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_experience extends Model
{
    use HasFactory;

    public $fillable=["year","benifit","vacation"];
    public $hidden=["created_at","updated_at"];
    public function employees(){

        return $this->hasMany("App\Models\\employee","experience_id");

    }

}
