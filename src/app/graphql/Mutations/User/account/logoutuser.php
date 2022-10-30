<?php

namespace App\GraphQL\Mutations\User\account;

use GraphQL\Language\Token;
use Illuminate\Support\Facades\Auth;

final class logoutuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=Auth::guard("user_api")->user();
        $user->message=trans("admin.you are logout successfully");
        $user->token()->revoke();
        return $user;


    }
}
