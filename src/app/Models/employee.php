<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    use HasFactory;

    public $fillable=["name","email","phone","address","date_of_birth","is_empty","vacation_token","gender"];
    public $hidden=["job_id","manager_id","resturant_id","experience_id","created_at","updated_at"];

    public function job(){

        return $this->belongsTo("App\Models\job","job_id");

    }

    public function resturant(){

        return $this->belongsTo("App\Models\\resturant","resturant_id");

    }

    public function employees(){

        return $this->hasMany("App\Models\\employee","manager_id");
    }

    public function manager(){

        return $this->belongsTo("App\Models\\employee","manager_id");
    }

    public function experience(){

        return $this->belongsTo("App\Models\\employee_experience","experience_id");

    }


    public function getIsEmptyAttribute($value){

        return ($value)?trans("admin.yes"):trans("admin.no");

    }

    public function getGenderAttribute($value){

        return ($value)?trans("admin.male"):trans("admin.female");

    }


    public function admin(){

        return $this->hasOne("App\Models\admin","employee_id");


    }

}
