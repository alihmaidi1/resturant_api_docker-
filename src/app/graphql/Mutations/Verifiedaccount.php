<?php

namespace App\GraphQL\Mutations;

use App\Exceptions\CustomException;
use App\Models\User;
use stdClass;

final class Verifiedaccount
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=User::find($args["id"]);
        if($user->operation_code==$args["code"]){

            $user->status=1;
            $user->operation_code=null;
            $user->save();
            $obj=new stdClass();
            $obj->message=trans("admin.the account was verified successfully");
            return $obj;

        }else{

           throw new CustomException(trans("admin.the code is not correct"));
        }


    }
}
