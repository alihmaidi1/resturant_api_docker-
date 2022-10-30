<?php

namespace App\GraphQL\Mutations\Admin\account;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Hash;

final class changepassword
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $admin=auth('reset_password')->user();
        if($admin->reset_code!=null){

            throw new CustomException(trans("admin.we have error"));
        }

        $admin->password=Hash::make($args["password"]);
        $admin->save();
        $admin->role;
        $admin->employee;
        $admin->message=trans("admin.the password was updated successfully");
        $token=tokenInfo($admin->email,$args['password'],"admins");
        if($token->status()==200){

            $admin->token_info=$token->json();
            auth('reset_password')->logout();
            return $admin;

        }else{

            throw new CustomException(trans("admin.we have error"));
        }


    }
}
