<?php

namespace App\GraphQL\Mutations;

use App\Models\admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

final class Changepassword
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $admin=admin::find($args["id"]);
        $admin->password=Hash::make($args["password"]);
        $admin->save();
        $admin->role;
        $admin->employee;
        $admin->message=trans("admin.the password was updated successfully");
        $token=$this->tokenInfo($admin->email,$args['password']);
        $admin->token_info=$token->json();
        return $admin;

    }

    public function tokenInfo($email,$password){


        $client=DB::table('oauth_clients')->first();
        return Http::asForm()->post(env("APP_URL")."/oauth/token",[
            'grant_type' => 'password',
            'client_id' =>$client->id,
            'client_secret' => $client->secret ,
            'username' => $email,
            'password' => $password,

        ]);


    }

}
