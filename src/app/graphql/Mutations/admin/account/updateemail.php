<?php

namespace App\GraphQL\Mutations\Admin\account;

final class updateemail
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $admin=auth()->user();
        $admin->email=$args["email"];
        $admin->save();
        $admin->message=trans("admin.the email was updated successfully");
        $admin->resturant;
        $admin->role;
        return $admin;

    }
}
