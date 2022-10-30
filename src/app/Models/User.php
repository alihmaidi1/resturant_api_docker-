<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Laravel\Passport\HasApiTokens;

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



    public function carts(){


        return $this->hasMany("\App\Models\cart","user_id");
    }



    public function chats(){

        return $this->hasMany("\App\Models\chat","user_id");
    }


}
