<?php

namespace App\GraphQL\Mutations\User\account;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Auth;

final class loginuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        if(Auth::guard('web')->attempt(['email'=>$args['email'],"password"=>$args['password']])){
            $user=auth("web")->user();
            $token=tokenInfo($args['email'],$args['password'],"users");
            $user->token_info=$token->json();
            $user->message=trans("admin.your are login successfully");
            return $user;
        }else{

                throw new CustomException(trans("admin.The Email Or Password Is Not Correct"));

        }


    }
}
