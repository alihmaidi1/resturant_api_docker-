<?php

namespace App\GraphQL\Queries;

use App\Models\chat;
use App\Models\message;
use App\Models\resturant;

final class Getresturantmessage
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $userID=auth("user_api")->user()->id;
        $chatID=chat::where("user_id",$userID)->where("resturant_id",$args["resturant_id"])->first()->id;
        $messages=message::where("chat_id",$chatID)->get();
        return $messages;
    }
}
