<?php

namespace App\GraphQL\Mutations\User\account;

use App\Exceptions\CustomException;
use stdClass;

final class checkresetcodeuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user=auth("reset_user_password")->user();
        if($user->reset_code==$args["code"]){

            $user->reset_code=null;
            $user->save();
            $messages=new stdClass();
            $messages->message=trans("admin.the code is correct");
            return $messages;
        }else{

            throw new CustomException(trans("admin.code not correct"));

        }


    }
}
