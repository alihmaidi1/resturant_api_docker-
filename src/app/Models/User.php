<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use  HasFactory,HasApiTokens,Notifiable;

    protected $fillable = ["name","code","balance","copon_notification","email","password","status","operation_code"];

    protected $hidden = ["created_at","updated_at","password"];


}
