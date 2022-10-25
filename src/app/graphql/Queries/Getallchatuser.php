<?php

namespace App\GraphQL\Queries;

use App\Models\chat;
use App\Models\message;

final class Getallchatuser
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        // $userID=auth("user_api")->user()->id;
        // $chats=chat::with(["messages"])->where("user_id",$userID)->get();
        // return $chats;
        $userID=auth("user_api")->user()->id;
        $chats=chat::where("user_id",$userID)->get();
        $arr=[];
        foreach($chats as $chat){
        $count=message::where("chat_id",$chat->id)->where("status",0)->where("sendBy",1)->count();
        $chat->unreadmessage=$count;
        $arr[]=$chat;

        }

        return $arr;

    }
}
