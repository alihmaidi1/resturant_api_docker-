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

    public $fillable=["email","password","role_id","employee_id"];
    protected $hidden = ["created_at","updated_at","password","role_id"];

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

    public function employee(){

        return $this->belongsTo("App\Models\\employee","employee_id");

    }


}
