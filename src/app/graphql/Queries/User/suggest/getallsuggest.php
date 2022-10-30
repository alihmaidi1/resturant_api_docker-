<?php

namespace App\GraphQL\Queries\User\suggest;

use App\Models\suggest;

final class getallsuggest
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {

        $user=auth("web")->user();
        $suggests=suggest::where("user_id",$user->id)->get();
        return $suggests;

    }
}
