<?php

namespace App\GraphQL\Queries;

final class Me
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $auth=auth("api")->user();
        $auth->role;
        $auth->resturant;
        $auth->message=trans("admin.The profile info was fetched successfully");
        return $auth;
    }
}
