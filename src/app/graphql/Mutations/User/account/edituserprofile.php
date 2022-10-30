<?php

namespace App\GraphQL\Mutations\User\account;

use App\Models\User;

final class edituserprofile
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=auth("user_api")->user();
        $user->name=$args["name"];
        $user->copon_notification=$args["copon_notification"];
        $user->save();
        $user->message=trans("admin.the profile was updated successfully");
        return $user;


    }
}
