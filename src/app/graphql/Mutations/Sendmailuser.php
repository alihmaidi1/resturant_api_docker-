<?php

namespace App\GraphQL\Mutations;

use App\Mail\reset_user_password;
use App\Mail\resetpassword;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use stdClass;

final class Sendmailuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=User::where("email",$args['email'])->first();
        $token=auth("reset_user_password")->login($user);
        Mail::to($args['email'])->send(new resetpassword($token,"user"));
        $messages = new \stdClass();
        $messages->message=trans("admin.the Email Was Send To You Successfully");
        return $messages;



    }
}
