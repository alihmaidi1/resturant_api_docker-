<?php

namespace App\GraphQL\Mutations\User\account;

use App\Mail\resetemail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

final class sendmailuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=User::where("email",$args['email'])->first();
        $token=auth("reset_user_password")->login($user);
        $user->reset_code=rand(100000,999999);
        $user->save();
        Mail::to($args['email'])->send(new resetemail($user->reset_code));
        $messages = new \stdClass();
        $messages->message=trans("admin.the Email Was Send To You Successfully");
        $messages->token=$token;
        return $messages;


    }
}
