<?php

namespace App\GraphQL\Mutations\User\account;

use App\Exceptions\CustomException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

final class loginuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

            $token=tokenInfo($args['email'],$args['password'],"users");
            if($token->status()==200){

                $user=User::where("email",$args["email"])->first();
                $user->token_info=$token->json();
                $user->message=trans("admin.your are login successfully");
                return $user;

            }else{


                throw new CustomException(trans("admin.The Email Or Password Is Not Correct"));

            }



    }
}
