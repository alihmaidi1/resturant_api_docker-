<?php

namespace App\GraphQL\Mutations;
use App\Models\admin;
use Mail;
use \App\Mail\resetpassword ;

final class Resetemail
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $admin=admin::where("email",$args['email'])->first();
        $token=auth("reset_password")->login($admin);
        Mail::to($args['email'])->send(new resetpassword($token,"admin"));
        $messages = new \stdClass();
        $messages->message=trans("admin.the Email Was Send To You Successfully");
        return $messages;
    }
}
