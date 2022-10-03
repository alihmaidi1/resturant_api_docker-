<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable  implements JWTSubject
{
    use  HasFactory,HasApiTokens,Notifiable;

    protected $fillable = ["name","code","balance","copon_notification","email","password","status","operation_code"];

    protected $hidden = ["created_at","updated_at","password"];


    public function getJWTCustomClaims()
    {
        return [];
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }


    public function suggests(){



        return $this->hasMany("\App\Models\suggest","user_id");



    }


    public function wishlists(){


        return $this->hasMany("\App\Models\wishlist","user_id");

    }


}
