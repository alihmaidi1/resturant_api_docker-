<?php

namespace App\GraphQL\Mutations;

use App\Models\chat;
use App\Models\message;
use stdClass;

final class Changeusermessagestatus
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $userID=auth("user_api")->user()->id;
        $chatID=chat::where("user_id",$userID)->where("resturant_id",$args["resturant_id"])->first()->id;
        $messages=message::where("chat_id",$chatID)->where("status",0)->get();

        foreach($messages as $message){

            $message->status=1;
            $message->save();

        }

        $obj=new stdClass();
        $obj->message=trans("admin.the message status was updated successfully");
        return $obj;
    }
}
