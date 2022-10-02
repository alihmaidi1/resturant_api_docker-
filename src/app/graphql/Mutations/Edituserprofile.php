<?php

namespace App\GraphQL\Mutations;

use App\Models\User;

final class Edituserprofile
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=User::find($args["id"]);
        $user->name=$args["name"];
        $user->copon_notification=$args["copon_notification"];
        $user->save();
        $user->message=trans("admin.the profile was updated successfully");
        return $user;

    }
}
