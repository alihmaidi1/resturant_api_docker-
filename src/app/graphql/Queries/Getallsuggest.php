<?php

namespace App\GraphQL\Queries;

use App\Models\suggest;

final class Getallsuggest
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=auth("user_api")->user();
        $suggests=suggest::where("user_id",$user->id)->get();
        return $suggests;

    }
}
