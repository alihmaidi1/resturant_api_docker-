<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class admin extends Authenticatable implements JWTSubject
{
    use HasFactory,HasApiTokens;

    public $fillable=["email","password","role_id","reset_code","resturant_id","rank"];
    protected $hidden = ["created_at","updated_at","password"];

    public function role(){

        return $this->belongsTo("App\Models\\role","role_id");

    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }



    public function resturant(){

        return $this->belongsTo(resturant::class,"resturant_id");
    }

}
