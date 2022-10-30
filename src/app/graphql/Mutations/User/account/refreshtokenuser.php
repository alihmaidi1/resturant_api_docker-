<?php

namespace App\GraphQL\Mutations\User\account;

use App\Exceptions\CustomException;

final class refreshtokenuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $val=refreshToken($args["your_refresh_token"],"users");
        if($val->status()==200){

            return $val->json();

        }else{

            throw new CustomException(trans("admin.refresh token is not correct"));


        }


    }
}
