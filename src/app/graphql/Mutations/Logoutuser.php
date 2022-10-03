<?php

namespace App\GraphQL\Mutations;

use Illuminate\Support\Facades\Auth;

final class Logoutuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $user=Auth::guard("user_api")->user();
        $user->message=trans("admin.you are logout successfully");
        $user->token()->refoke();
        return $user;


    }
}
