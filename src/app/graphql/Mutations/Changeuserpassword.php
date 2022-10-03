<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

final class Changeuserpassword
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user=auth('reset_user_password')->user();
        $user->password=Hash::make($args["password"]);
        $user->save();
        $user->message=trans("admin.the password was updated successfully");
        $token=$this->tokenInfo($user->email,$args['password']);
        $user->token_info=$token->json();
        auth('reset_user_password')->logout();
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
