<?php

namespace App\GraphQL\Mutations\Admin\account;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

final class token
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $val=refreshToken($args["your_refresh_token"],"admins");
        if($val->status()==200){

            return $val->json();

        }else{

            throw new CustomException(trans("admin.refresh token is not correct"));

        }





    }
}
