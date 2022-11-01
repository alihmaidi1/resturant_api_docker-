<?php

namespace App\GraphQL\Mutations\Admin\account;

use App\Mail\resetemail as MailResetemail;
use App\Models\admin;
use Illuminate\Support\Facades\Mail;
use stdClass;

final class resetemail
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        $admin=admin::where("email",$args['email'])->first();
        $token=auth("reset_password")->login($admin);
        $number=rand(100000,999999);
        $admin->reset_code=$number;
        $admin->save();
        Mail::to($args['email'])->send(new MailResetemail($number));
        $messages = new \stdClass();
        $messages->message=trans("admin.the Email Was Send To You Successfully");
        $messages->token=$token;
        return $messages;

    }
}
