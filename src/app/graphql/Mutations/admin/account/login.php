<?php

namespace App\GraphQL\Mutations\Admin\account;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;

final class login
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        if(Auth::guard('api_web')->attempt(['email'=>$args['email'],"password"=>$args['password']])){
            $user=auth("api_web")->user();
            $user->role;
            $user->employee;
            $user->resturant;
            $token=tokenInfo($args['email'],$args['password']);
            $user->token_info=$token->json();
            $user->message=trans("admin.your are login successfully");
            return $user;
        }else{

                throw new CustomException(trans("admin.The Email Or Password Is Not Correct"));

            }



    }
}
