<?php

namespace App\GraphQL\Mutations\Admin\account;

use App\Exceptions\CustomException;
use stdClass;

final class checkresetcode
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $admin=auth("reset_password")->user();
        if($admin->reset_code==$args["code"]){

            $admin->reset_code=null;
            $admin->save();
            $messages=new stdClass();
            $messages->message=trans("admin.the code is correct");
            return $messages;
        }else{

            throw new CustomException(trans("admin.we have error"));

        }

    }
}
