<?php

namespace App\GraphQL\Mutations;

use App\Mail\verified_account;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

final class Createuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $verified_code=rand(100000,999999);
        $user=User::create([
            "name"=>$args["name"],
            "code"=>rand(100000,999999),
            "email"=>$args["email"],
            "password"=>Hash::make($args["password"]),
            "status"=>0,
            "operation_code"=>$verified_code,
            "copon_notification"=>0,
            "balance"=>0
        ]);
        Mail::to($args["email"])->send(new verified_account($verified_code));
        $user->message=trans("admin.the account was created successfully");
        $user->token_info=$this->tokenInfo($args["email"],$args["password"]);
        return $user;


    }
    public function tokenInfo($email,$password){

        $client=DB::table('oauth_clients')->where("provider","users")->first();

        return Http::asForm()->post(env("APP_URL")."/oauth/token",[
                'grant_type' => 'password',
                'client_id' =>$client->id,
                'client_secret' => $client->secret ,
                'username' => $email,
                'password' => $password,

        ]);


    }


}
