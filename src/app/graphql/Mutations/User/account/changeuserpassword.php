<?php

namespace App\GraphQL\Mutations\User\account;

use Illuminate\Support\Facades\Hash;

final class changeuserpassword
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=auth('reset_user_password')->user();
        $user->password=Hash::make($args["password"]);
        $user->reset_code=null;
        $user->save();
        $user->message=trans("admin.the password was updated successfully");
        $token=tokenInfo($user->email,$args['password'],"users");
        $user->token_info=$token->json();
        auth('reset_user_password')->logout();
        return $user;


    }
}
