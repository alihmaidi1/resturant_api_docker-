<?php

namespace App\GraphQL\Queries\Admin\account;

final class me
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {


        $auth=auth("api")->user();

        $auth->message=trans("admin.The profile info was fetched successfully");
        return $auth;

    }
}
