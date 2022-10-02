<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

final class Loginuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        if(Auth::guard('web')->attempt(['email'=>$args['email'],"password"=>$args['password']])){
            $user=auth("web")->user();

            $token=$this->tokenInfo($args['email'],$args['password']);
            $user->token_info=$token->json();
            $user->message=trans("admin.your are login successfully");
            return $user;
        }else{

                throw new CustomException(trans("admin.The Email Or Password Is Not Correct"));

        }



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
